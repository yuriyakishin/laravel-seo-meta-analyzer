<?php

namespace Yu\SeoMetaAnalyzer\Data;

use Yu\SeoMetaAnalyzer\Enums\LengthStatus;
use Yu\SeoMetaAnalyzer\Enums\ReportStatus;

class Report
{
    /**
     * @param  array{relevance: int, intent: int, ctr: int, technical: float}  $scores
     * @param  array{title: ?string, description: ?string, h1: list<string>, titleLength: int, titleStatus: value-of<LengthStatus>, descriptionLength: int, descriptionStatus: value-of<LengthStatus>}  $current
     * @param  list<array{status: value-of<ReportStatus>, title: string, text: string}>  $issues
     * @param  list<string>  $recommendations
     * @param  list<array{label: string, title: string, description: string, h1: string, titleLength: int, titleStatus: value-of<LengthStatus>, descriptionLength: int, descriptionStatus: value-of<LengthStatus>}>  $variants
     */
    public function __construct(
        public string $url,
        public string $locale,
        public string $checkedAt,
        public float $overall,
        public array $scores,
        public string $headline,
        public string $summary,
        public array $current,
        public array $issues,
        public array $recommendations,
        public array $variants,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
