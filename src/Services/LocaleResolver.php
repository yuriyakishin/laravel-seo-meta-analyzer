<?php

namespace Yu\SeoMetaAnalyzer\Services;

use Yu\SeoMetaAnalyzer\Data\Meta;
use Yu\WebToolsCore\Locale\LocaleResolver as BaseLocaleResolver;

/**
 * The shared locale picker over this tool's translations, plus the language of the checked page.
 */
class LocaleResolver extends BaseLocaleResolver
{
    public function __construct()
    {
        parent::__construct(dirname(__DIR__, 2).'/resources/lang');
    }

    /**
     * The checked page's <html lang> when it has a translation: "de-DE" → "de".
     */
    public function fromPage(Meta $meta): ?string
    {
        return $this->toSupported($meta->lang);
    }
}
