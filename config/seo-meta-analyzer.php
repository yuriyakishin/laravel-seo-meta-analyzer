<?php

declare(strict_types=1);

use Yu\SeoMetaAnalyzer\Llm\OpenAI;

return [
    'enabled' => env('SEO_META_ANALYZER_ENABLED', true),

    /*
     * Which AI answers: a key of "providers". A new provider is a class implementing
     * Yu\SeoMetaAnalyzer\Llm\LlmProvider plus its section below; the class gets the section as $config.
     */
    'provider' => env('SEO_META_ANALYZER_PROVIDER', 'openai'),

    'providers' => [
        'openai' => [
            'class' => OpenAI::class,
            'api_key' => env('SEO_META_ANALYZER_OPENAI_API_KEY'),
            'endpoint' => env('SEO_META_ANALYZER_OPENAI_ENDPOINT', 'https://api.openai.com/v1/chat/completions'),
            'model' => env('SEO_META_ANALYZER_OPENAI_MODEL', 'gpt-4o-mini'),
            'timeout' => (int) env('SEO_META_ANALYZER_OPENAI_TIMEOUT', 25),
            /* Low temperature and a fixed seed: a recheck of the same page gives (nearly) the same scores. */
            'temperature' => 0.2,
            'seed' => 42,
            'max_tokens' => 1500,
        ],
    ],

    /* Page loading itself (timeouts, redirects, user agent) is set in config/web-tools-core.php. */
    'fetch' => [
        'max_bytes' => 2 * 1024 * 1024,
    ],

    'rate_limit' => [
        /* AI requests per visitor IP; a recheck of an unchanged page comes from the cache and does not count. */
        'per_hour' => (int) env('SEO_META_ANALYZER_PER_HOUR', 5),
        /* Page loads per visitor IP, cached checks too: keeps the tool from being used to flood other sites. */
        'pages_per_hour' => (int) env('SEO_META_ANALYZER_PAGES_PER_HOUR', 30),
    ],

    'cache' => [
        'ttl' => 86400,
    ],

    /* Characters of page text sent to the AI. */
    'text_limit' => 4000,
];
