<?php

namespace Yu\SeoMetaAnalyzer\Enums;

enum ReportStatus: string
{
    case Critical = 'critical';
    case Warning = 'warning';
    case Ok = 'ok';
}
