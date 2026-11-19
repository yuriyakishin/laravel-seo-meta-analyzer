<?php

declare(strict_types=1);

namespace Yu\SeoMetaAnalyzer\Data;

class Meta
{
    /**
     * @param  list<string>  $h1
     */
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public array $h1 = [],
        public ?string $canonical = null,
        public ?string $lang = null,
        public ?string $ogTitle = null,
        public ?string $ogDescription = null,
        public ?string $robots = null,
        public string $text = '',
        public bool $thinContent = false,
    ) {}
}
