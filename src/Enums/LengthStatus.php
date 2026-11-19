<?php

namespace Yu\SeoMetaAnalyzer\Enums;

enum LengthStatus: string
{
    case Ok = 'ok';
    case Near = 'near';
    case Bad = 'bad';
    case Missing = 'missing';
}
