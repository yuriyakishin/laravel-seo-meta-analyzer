<?php

declare(strict_types=1);

namespace Yu\SeoMetaAnalyzer\Services;

use Dom\Element;
use Dom\HTMLDocument;
use Dom\XPath;
use Yu\SeoMetaAnalyzer\Data\Meta;
use Yu\SeoMetaAnalyzer\Data\Page;
use Yu\SeoMetaAnalyzer\Exceptions\AnalyzerException;

class MetaExtractor
{
    /** Elements that are not page content. */
    private const string NOISE = 'script, style, noscript, template, svg, iframe, form, nav, header, footer, aside';

    private const int THIN_CONTENT_LENGTH = 200;

    public function extract(Page $page): Meta
    {
        $document = HTMLDocument::createFromString($page->html, LIBXML_NOERROR, $page->charset);

        $h1 = [];
        foreach ($document->querySelectorAll('h1') as $heading) {
            $text = $this->clean($heading->textContent);
            if ($text !== null) {
                $h1[] = $text;
            }
        }

        $meta = [
            'title' => $this->clean($document->querySelector('title')?->textContent),
            'description' => $this->attribute($document, 'meta[name="description" i]', 'content'),
            'canonical' => $this->attribute($document, 'link[rel="canonical" i]', 'href'),
            'lang' => $this->clean($document->documentElement?->getAttribute('lang')),
            'ogTitle' => $this->attribute($document, 'meta[property="og:title" i]', 'content'),
            'ogDescription' => $this->attribute($document, 'meta[property="og:description" i]', 'content'),
            'robots' => $this->attribute($document, 'meta[name="robots" i]', 'content'),
        ];

        foreach ($document->querySelectorAll(self::NOISE) as $node) {
            $node->remove();
        }

        $root = $document->querySelector('main') ?? $document->querySelector('article') ?? $document->body;
        $text = $this->cut($this->textOf($root), (int) config('seo-meta-analyzer.text_limit'));

        if ($meta['title'] === null && $meta['description'] === null && $h1 === [] && $text === '') {
            throw new AnalyzerException('no_content');
        }

        return new Meta(
            ...$meta,
            h1: $h1,
            text: $text,
            thinContent: mb_strlen($text) < self::THIN_CONTENT_LENGTH,
        );
    }

    private function attribute(HTMLDocument $document, string $selector, string $attribute): ?string
    {
        return $this->clean($document->querySelector($selector)?->getAttribute($attribute));
    }

    /**
     * Joins text nodes with spaces, so "<h2>A</h2><p>B</p>" becomes "A B", not "AB".
     */
    private function textOf(?Element $root): string
    {
        if ($root === null) {
            return '';
        }

        $parts = [];
        foreach ((new XPath($root->ownerDocument))->query('.//text()', $root) as $node) {
            $parts[] = $node->textContent;
        }

        return $this->clean(implode(' ', $parts)) ?? '';
    }

    /**
     * Cuts the text at the last space before the limit, so no word is broken.
     */
    private function cut(string $text, int $limit): string
    {
        if (mb_strlen($text) <= $limit) {
            return $text;
        }

        $text = mb_substr($text, 0, $limit);
        $lastSpace = mb_strrpos($text, ' ');

        return $lastSpace === false ? $text : mb_substr($text, 0, $lastSpace);
    }

    /**
     * Trims and collapses whitespace; an empty result becomes null.
     */
    private function clean(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim(preg_replace('/\s+/u', ' ', $value));

        return $value === '' ? null : $value;
    }
}
