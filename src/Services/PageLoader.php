<?php

declare(strict_types=1);

namespace Yu\SeoMetaAnalyzer\Services;

use Yu\SeoMetaAnalyzer\Data\Page;
use Yu\SeoMetaAnalyzer\Exceptions\AnalyzerException;
use Yu\WebToolsCore\Exceptions\ToolException;
use Yu\WebToolsCore\Http\SafeFetcher;

/**
 * Loads the HTML page to analyse through the shared safe fetcher; only a 200 HTML answer is a page.
 */
class PageLoader
{
    public function __construct(private SafeFetcher $fetcher) {}

    public function fetch(string $url): Page
    {
        try {
            $resource = $this->fetcher->fetch(
                $url,
                ['text/html', 'application/xhtml+xml'],
                (int) config('seo-meta-analyzer.fetch.max_bytes'),
                'text/html,application/xhtml+xml',
            );
        } catch (ToolException $e) {
            $reason = $e->reason === 'unsupported_type' ? 'not_html' : $e->reason;

            throw new AnalyzerException($reason, $e->replace, $e);
        }

        if ($resource->status !== 200) {
            throw new AnalyzerException('http_error', ['status' => $resource->status]);
        }

        return new Page($resource->url, $resource->body, $resource->charset);
    }
}
