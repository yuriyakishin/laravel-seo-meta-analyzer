<?php

namespace Yu\SeoMetaAnalyzer\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Yu\SeoMetaAnalyzer\Data\Report;

class MetaAnalyzerResultEvent
{
    use Dispatchable;

    public function __construct(public readonly Report $report) {}
}
