@php($t = fn (string $key, array $replace = []) => __('seo-meta-analyzer::messages.'.$key, $replace, $locale))
@php([$titleMin, $titleMax] = \Yu\SeoMetaAnalyzer\Services\MetaAnalyzer::TITLE_RANGE)
@php([$descriptionMin, $descriptionMax] = \Yu\SeoMetaAnalyzer\Services\MetaAnalyzer::DESCRIPTION_RANGE)

<div class="sma" lang="{{ $locale }}" x-data="{
        copied: null,
        step: 0,
        timer: null,
        start() { this.step = 0; clearInterval(this.timer); this.timer = setInterval(() => this.step = Math.min(this.step + 1, 3), 2500) },
        copy(text, key) {
            const done = () => { this.copied = key; setTimeout(() => this.copied = null, 1500) };
            if (navigator.clipboard && window.isSecureContext) { navigator.clipboard.writeText(text).then(done); return }
            {{-- http:// has no Clipboard API: copy through a hidden textarea --}}
            const area = Object.assign(document.createElement('textarea'), { value: text, readOnly: true });
            area.style.cssText = 'position:fixed;opacity:0';
            document.body.append(area); area.select(); document.execCommand('copy'); area.remove(); done();
        },
        again() { this.$refs.form.scrollIntoView({ behavior: 'smooth', block: 'center' }); this.$refs.url.focus({ preventScroll: true }); this.$refs.url.select() },
    }">
    {{-- Форма --}}
    <form class="sma-tool" wire:submit="analyze" @submit="start()" x-ref="form" novalidate>
        <div class="sma-row">
            <div @class(['sma-field', 'sma-field-err' => $errors->has('url')])>
                <input id="sma-url" type="text" inputmode="url" autocomplete="url" placeholder=" "
                       wire:model="url" x-ref="url">
                <label for="sma-url">{{ $t('form.label') }}</label>
            </div>
            <button type="submit" class="sma-go" wire:loading.attr="disabled" wire:target="analyze">
                <span wire:loading.remove wire:target="analyze">{{ $t('form.button') }}</span>
                <span wire:loading wire:target="analyze" class="sma-spin" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sma-hint">
            <span>{{ $t('form.hint', ['count' => config('seo-meta-analyzer.rate_limit.per_hour')]) }}</span>
        </div>
        @error('url')<p class="sma-error">{{ $message }}</p>@enderror
        @if ($error)
            <p class="sma-error" role="alert">{{ $error }}</p>
        @endif
    </form>

    {{-- Загрузка: строки "лога" загораются по таймеру, пока идёт один долгий запрос --}}
    <div class="sma-report sma-log" wire:loading.block wire:target="analyze" aria-hidden="true">
        @foreach (['fetch', 'extract', 'ai', 'variants'] as $i => $line)
            <p :class="{ 'sma-run': step === {{ $i }}, 'sma-done': step > {{ $i }} }">{{ $t('loading.'.$line) }}</p>
        @endforeach
    </div>

    {{-- Отчёт --}}
    @if ($report)
        {{-- A new block for every check (keyed by the count), so each report scrolls the tool up to its form --}}
        <div wire:key="wt-report-{{ $reportNumber }}" class="sma-report" wire:loading.remove wire:target="analyze" aria-live="polite"
             x-init="$root.scrollIntoView({ behavior: 'smooth', block: 'start' })">
            <div class="sma-bar">
                <span>report · {{ parse_url($report['url'], PHP_URL_HOST) }} · {{ \Illuminate\Support\Carbon::parse($report['checkedAt'])->locale($locale)->isoFormat('L') }}</span>
                <button type="button" class="sma-btn" @click="again()">{{ $t('report.again') }}</button>
            </div>

            <div class="sma-part sma-score">
                <div class="sma-ring" style="--v: {{ $report['overall'] }}">
                    <b>{{ $report['overall'] }}</b><small>/10</small></div>
                <div>
                    <h2>{{ $report['headline'] }}</h2>
                    <p class="sma-sum">{{ $report['summary'] }}</p>
                </div>
                <ul class="sma-crit">
                    @foreach ($report['scores'] as $name => $score)
                        <li><span>{{ $t('report.criteria.'.$name) }}</span><b>{{ $score }}</b><i
                                style="--v: {{ $score }}"></i></li>
                    @endforeach
                </ul>
            </div>

            <div class="sma-part">
                <h3 class="sma-h">{{ $t('report.compare') }}</h3>
                <div class="sma-cmp">
                    @foreach (['current' => $report['current'], 'new' => $report['variants'][0]] as $kind => $snippet)
                        <div @class(['sma-col', 'sma-new' => $kind === 'new'])>
                            <p class="sma-tag">{{ $t('report.'.$kind) }}</p>
                            <div class="sma-serp">
                                <span class="sma-serp-u">{{ parse_url($report['url'], PHP_URL_HOST) }} ›</span>
                                <span class="sma-serp-t">{{ $snippet['title'] ?? $t('report.missing') }}</span>
                                <span class="sma-serp-d">{{ $snippet['description'] ?? $t('report.missing') }}</span>
                            </div>
                            <dl class="sma-len">
                                <div>
                                    <dt>Title</dt>
                                    <dd class="sma-{{ $snippet['titleStatus'] }}">{{ $t('report.length', ['count' => $snippet['titleLength'], 'min' => $titleMin, 'max' => $titleMax]) }}</dd>
                                </div>
                                <div>
                                    <dt>Description</dt>
                                    <dd class="sma-{{ $snippet['descriptionStatus'] }}">{{ $t('report.length', ['count' => $snippet['descriptionLength'], 'min' => $descriptionMin, 'max' => $descriptionMax]) }}</dd>
                                </div>
                                {{-- Now: the first H1 of the page (a list, may be empty); recommended: the variant's H1 --}}
                                @php($h1 = $kind === 'current' ? ($snippet['h1'][0] ?? null) : ($snippet['h1'] ?? null))
                                <div>
                                    <dt>H1</dt>
                                    <dd @class(['sma-missing' => $h1 === null])>{{ $h1 === null ? $t('report.missing') : '«'.$h1.'»' }}</dd>
                                </div>
                            </dl>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="sma-part sma-two">
                <div>
                    <h3 class="sma-h">{{ $t('report.issues') }}</h3>
                    <ul class="sma-issues">
                        @foreach ($report['issues'] as $issue)
                            <li class="sma-{{ $issue['status'] }}"><b>{{ $issue['title'] }}</b>{{ $issue['text'] }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="sma-h">{{ $t('report.recommendations') }}</h3>
                    <ol class="sma-recs">
                        @foreach ($report['recommendations'] as $recommendation)
                            <li>{{ $recommendation }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>

            <div class="sma-part">
                <h3 class="sma-h">{{ $t('report.variants') }}</h3>
                <div class="sma-vars">
                    @foreach ($report['variants'] as $i => $variant)
                        <div class="sma-var">
                            <p class="sma-tag">{{ $t('report.variant', ['number' => $i + 1]) }}
                                · {{ $variant['label'] }}</p>
                            {{-- Every field has its own button and is copied as plain text, ready to paste into a CMS --}}
                            @foreach ([
                                'title' => [$variant['title'], $variant['titleLength'], $variant['titleStatus']],
                                'description' => [$variant['description'], $variant['descriptionLength'], $variant['descriptionStatus']],
                                'h1' => [$variant['h1'] ?? null, null, null],
                            ] as $field => [$text, $length, $status])
                                @continue($text === null)
                                @php($key = $i.'-'.$field)
                                <div class="sma-var-f">
                                    <div class="sma-var-l">
                                        <span>{{ $field === 'h1' ? 'H1' : ucfirst($field) }}@if ($length !== null) · <b class="sma-{{ $status }}">{{ $length }}</b>@endif</span>
                                        <button type="button" class="sma-copy" @click="copy(@js($text), @js($key))"
                                                x-text="copied === @js($key) ? @js($t('report.copied')) : @js($t('report.copy'))">{{ $t('report.copy') }}</button>
                                    </div>
                                    <p @class(['sma-var-t' => $field === 'title', 'sma-var-d' => $field !== 'title'])>{{ $text }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <p class="sma-note">{{ $t('report.note') }}</p>
            </div>
        </div>
    @endif
</div>
