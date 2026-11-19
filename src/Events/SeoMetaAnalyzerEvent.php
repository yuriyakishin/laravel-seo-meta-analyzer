<?php

declare(strict_types=1);

namespace Yu\SeoMetaAnalyzer\Events;

use Illuminate\Foundation\Events\Dispatchable;

/**
 * A visitor ran a check in the tool: fired for every finished check, from the cache too, and for failed ones.
 * Unlike MetaAnalyzerResultEvent, which fires only when the AI was actually asked.
 */
class SeoMetaAnalyzerEvent
{
    use Dispatchable;

    /**
     * @param  string  $url  the checked address after normalisation
     * @param  string  $locale  language of the tool for this visitor
     * @param  array<string, mixed>|null  $report  Report::toArray(); null when the check failed
     * @param  string|null  $error  reason of the failure, e.g. "timeout" or "rate_limited"; null on success
     * @param  bool  $fromCache  the report was taken from the cache, no page load and no AI request
     */
    public function __construct(
        public readonly string $url,
        public readonly string $locale,
        public readonly ?array $report = null,
        public readonly ?string $error = null,
        public readonly bool $fromCache = false,
    ) {}
}
