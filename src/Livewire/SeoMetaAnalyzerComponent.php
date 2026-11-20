<?php

declare(strict_types=1);

namespace Yu\SeoMetaAnalyzer\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Throwable;
use Yu\SeoMetaAnalyzer\Data\Meta;
use Yu\SeoMetaAnalyzer\Data\Page;
use Yu\SeoMetaAnalyzer\Events\SeoMetaAnalyzerEvent;
use Yu\SeoMetaAnalyzer\Exceptions\AnalyzerException;
use Yu\SeoMetaAnalyzer\Services\LocaleResolver;
use Yu\SeoMetaAnalyzer\Services\MetaAnalyzer;
use Yu\SeoMetaAnalyzer\Services\MetaExtractor;
use Yu\SeoMetaAnalyzer\Services\PageLoader;

class SeoMetaAnalyzerComponent extends Component
{
    public string $url = '';

    /** Language of the form and the report; see LocaleResolver. */
    #[Locked]
    public string $locale = 'en';

    /** The visitor's browser language that has a translation; null when there is none. */
    #[Locked]
    public ?string $browserLocale = null;

    /** Report::toArray(); null until a check succeeds. */
    #[Locked]
    public ?array $report = null;

    #[Locked]
    public ?string $error = null;

    /** Counts the checks; the report block is keyed by it, so every new report is a new block that scrolls into view. */
    #[Locked]
    public int $reportNumber = 0;

    public function mount(LocaleResolver $locales): void
    {
        $this->browserLocale = $locales->fromBrowser(request());
        $this->locale = $this->browserLocale ?? app()->getLocale();
    }

    public function analyze(
        PageLoader $loader,
        MetaExtractor $extractor,
        MetaAnalyzer $analyzer,
        LocaleResolver $locales
    ): void {
        $this->reset('report', 'error');
        $this->reportNumber++;

        $this->validate(
            ['url' => ['required', 'string', 'max:2048']],
            ['url.*' => __('seo-meta-analyzer::messages.errors.invalid_url', [], $this->locale)],
        );

        if (!config('seo-meta-analyzer.enabled') || !$analyzer->isConfigured()) {
            $this->error = __('seo-meta-analyzer::messages.errors.disabled', [], $this->locale);
            $this->finished(error: 'disabled');

            return;
        }

        $this->url = $this->normalize($this->url);

        try {
            // The page is loaded on every check, so a fixed title is seen at once; the AI is asked only for new content
            $this->hitRateLimit('pages', (int) config('seo-meta-analyzer.rate_limit.pages_per_hour'));

            $page = $loader->fetch($this->url);
            $meta = $extractor->extract($page);
            $locale = $this->browserLocale ?? $locales->fromPage($meta) ?? $this->locale;
            $cacheKey = $this->cacheKey($page, $meta, $locale);

            if (Cache::has($cacheKey)) {
                $this->report = Cache::get($cacheKey);
                $this->locale = $locale;
                $this->finished(fromCache: true);

                return;
            }

            $this->hitRateLimit('checks', (int) config('seo-meta-analyzer.rate_limit.per_hour'));

            $this->report = $analyzer->analyze($page, $meta, $locale)->toArray();
            $this->locale = $locale;
        } catch (AnalyzerException $e) {
            $this->error = __('seo-meta-analyzer::messages.errors.'.$e->reason, $e->replace, $this->locale);
            $this->finished(error: $e->reason);

            return;
        } catch (Throwable $e) {
            report($e);
            $this->error = __('seo-meta-analyzer::messages.errors.generic', [], $this->locale);
            $this->finished(error: 'generic');

            return;
        }

        Cache::put($cacheKey, $this->report, (int) config('seo-meta-analyzer.cache.ttl'));
        $this->finished();
    }

    public function render(): View
    {
        return view('seo-meta-analyzer::seo-meta-analyzer');
    }

    /**
     * Trims, adds https:// when there is no scheme and drops the #fragment.
     */
    private function normalize(string $url): string
    {
        $url = trim($url);

        if (!preg_match('~^[a-z][a-z0-9+.-]*://~i', $url)) {
            $url = 'https://'.$url;
        }

        return Str::before($url, '#');
    }

    /**
     * Tells the site that a check is over: the report on success, the reason code on failure.
     */
    private function finished(?string $error = null, bool $fromCache = false): void
    {
        SeoMetaAnalyzerEvent::dispatch($this->url, $this->locale, $error === null ? $this->report : null, $error, $fromCache);
    }

    /**
     * The report depends only on what was extracted from the page and on the language: while they are the same,
     * the cached report is shown; any change of the title, description, H1 or text gives a new key.
     */
    private function cacheKey(Page $page, Meta $meta, string $locale): string
    {
        $content = [$page->finalUrl, $meta->title, $meta->description, $meta->h1, $meta->lang, $meta->robots, $meta->text];

        return 'seo-meta-analyzer:'.sha1($this->url).':'.$locale.':'.sha1(json_encode($content, JSON_UNESCAPED_UNICODE));
    }

    /**
     * Counts one attempt per visitor IP: "pages" are page loads, "checks" are AI requests, failed ones too.
     */
    private function hitRateLimit(string $name, int $perHour): void
    {
        $key = "seo-meta-analyzer:{$name}:".request()->ip();

        if (RateLimiter::tooManyAttempts($key, $perHour)) {
            throw new AnalyzerException('rate_limited', [
                'minutes' => (int) ceil(RateLimiter::availableIn($key) / 60),
            ]);
        }

        RateLimiter::hit($key, 3600);
    }
}
