# SEO Meta Analyzer

[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/php-%5E8.4-777bb4.svg)](composer.json)
[![Laravel](https://img.shields.io/badge/laravel-13-ff2d20.svg)](composer.json)
[![Livewire](https://img.shields.io/badge/livewire-4-fb70a9.svg)](composer.json)
[![Live Demo](https://img.shields.io/badge/live%20demo-yu.net.ua-brightgreen.svg)](https://yu.net.ua/en/tools/seo-meta-analyzer)

A Livewire tool for Laravel that checks a page's title and meta description, then has an AI score them and write better versions. The visitor enters a URL. The tool reads the page, runs technical checks on the meta tags, and asks the AI how well they match the page and the searcher's intent.

**🔗 Live example: [yu.net.ua/en/tools/seo-meta-analyzer](https://yu.net.ua/en/tools/seo-meta-analyzer)**

## What it checks

- **Technical checks**, without AI: a missing title or description, length outside the recommended range, several H1 headings, a title and description that say the same thing, and too little text on the page (a sign of a JavaScript-rendered page).
- **AI review**: scores relevance to the page, match with search intent and likely click-through. It names concrete issues and recommendations.
- **New versions**: three rewritten sets of title, description and H1, each from a different angle and with a copy button, shown next to the current snippet.

## Requirements

- PHP ^8.4
- Laravel ^13.0
- Livewire ^4.0
- An OpenAI API key, or your own AI provider (see [Using another AI provider](#using-another-ai-provider))

## Installation

```bash
composer require yu-laravel/seo-meta-analyzer
```

This also installs [`yu-laravel/web-tools-core`](https://github.com/yuriyakishin/web-tools-core). Both service providers are discovered automatically.

Set your OpenAI key in `.env`:

```
SEO_META_ANALYZER_OPENAI_API_KEY=sk-...
```

## Usage

Put the component on a page whose layout includes `@livewireStyles` and `@livewireScripts`:

```blade
<livewire:seo-meta-analyzer />
```

Import the styles into your CSS build:

```css
@import "../../vendor/yu-laravel/web-tools-core/resources/css/web-tools-core.css";
@import "../../vendor/yu-laravel/seo-meta-analyzer/resources/css/seo-meta-analyzer.css";
```

To match your site's colours and fonts, override the `--wt-*` variables (see [Web Tools Core](https://github.com/yuriyakishin/web-tools-core#styles)).

## Configuration

| Env variable | Default | Description |
|---|---|---|
| `SEO_META_ANALYZER_ENABLED` | `true` | Turn the tool off without uninstalling it. |
| `SEO_META_ANALYZER_PROVIDER` | `openai` | A key from `providers` in the config. |
| `SEO_META_ANALYZER_OPENAI_API_KEY` | | OpenAI API key. |
| `SEO_META_ANALYZER_OPENAI_MODEL` | `gpt-4o-mini` | Model name. |
| `SEO_META_ANALYZER_OPENAI_ENDPOINT` | OpenAI chat completions | Change it to use an OpenAI-compatible API. |
| `SEO_META_ANALYZER_OPENAI_TIMEOUT` | `25` | Seconds to wait for the AI. |
| `SEO_META_ANALYZER_PER_HOUR` | `5` | AI requests per visitor IP per hour. A recheck of an unchanged page comes from the cache and doesn't count. |
| `SEO_META_ANALYZER_PAGES_PER_HOUR` | `30` | Page loads per visitor IP per hour, cached ones included. This stops the tool from being used to flood other sites. |

A result is cached for 24 hours per page content, so an unchanged page doesn't trigger a second AI request. Page fetching (timeouts, redirects, user agent) is set in [Web Tools Core](https://github.com/yuriyakishin/web-tools-core#configuration).

## Using another AI provider

Implement `Yu\SeoMetaAnalyzer\Llm\LlmProvider`:

```php
interface LlmProvider
{
    public function isConfigured(): bool;

    public function complete(string $system, string $user, array $schema): array;
}
```

`complete()` gets the prompts and a JSON schema, and must return the decoded JSON answer. Add a section for your provider under `providers` in `config/seo-meta-analyzer.php`, with `class` set to your class, and select it with `SEO_META_ANALYZER_PROVIDER`. The class receives that config section as its `$config` constructor argument.

## Events

- `Yu\SeoMetaAnalyzer\Events\SeoMetaAnalyzerEvent` fires after every finished check: successful, failed or from the cache. It carries `url`, `locale`, `report` (null on failure), `error` and `fromCache`.
- `Yu\SeoMetaAnalyzer\Events\MetaAnalyzerResultEvent` fires only when the AI was actually asked. It carries the `Report` object.

## Languages

The form and the AI answer come in 13 languages: cs, de, en, es, fr, it, ja, nl, pl, pt, tr, uk and zh. The language is taken from the visitor's browser, with your app locale as the fallback.

## Limitations

The tool reads the HTML the server returns. On a page built entirely by JavaScript it sees little text, says so, and bases the score on the meta tags and the H1 only.

## License

MIT. See [LICENSE](LICENSE).
