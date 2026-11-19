<?php

namespace Yu\SeoMetaAnalyzer\Data;

class Page
{
    public function __construct(
        public string $finalUrl,
        public string $html,
        public ?string $charset = null,
    ) {}
}
