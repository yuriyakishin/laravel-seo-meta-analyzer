<?php

namespace Yu\SeoMetaAnalyzer\Llm;

use Yu\SeoMetaAnalyzer\Exceptions\AnalyzerException;

/**
 * One AI service (OpenAI, Claude…). It knows how to talk to its API; what to ask is up to MetaAnalyzer.
 *
 * A provider is created with its section of config('seo-meta-analyzer.providers') as the $config argument.
 */
interface LlmProvider
{
    /**
     * Whether the provider has what it needs to make requests, e.g. an API key.
     */
    public function isConfigured(): bool;

    /**
     * Sends the prompts and returns the answer decoded from JSON in the shape of $schema.
     *
     * @param  array<string, mixed>  $schema  JSON Schema of the answer
     * @return array<string, mixed>
     *
     * @throws AnalyzerException "ai_unavailable" when the service cannot be reached, "ai_bad_response" when the answer is not JSON
     */
    public function complete(string $system, string $user, array $schema): array;
}
