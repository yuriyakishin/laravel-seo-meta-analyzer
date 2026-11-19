<?php

declare(strict_types=1);

namespace Yu\SeoMetaAnalyzer\Exceptions;

use Yu\WebToolsCore\Exceptions\ToolException;

/**
 * A failure of the SEO meta analyzer; the reason is a key of seo-meta-analyzer::messages.errors.
 */
class AnalyzerException extends ToolException {}
