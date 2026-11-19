<?php

namespace Yu\SeoMetaAnalyzer\Llm;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Yu\SeoMetaAnalyzer\Exceptions\AnalyzerException;

/**
 * OpenAI Chat Completions with a strict JSON Schema answer.
 */
class OpenAI implements LlmProvider
{
    /**
     * @param  array{api_key: ?string, endpoint: string, model: string, timeout: int, temperature: float, seed: int, max_tokens: int}  $config
     */
    public function __construct(private array $config) {}

    public function isConfigured(): bool
    {
        return filled($this->config['api_key']);
    }

    public function complete(string $system, string $user, array $schema): array
    {
        try {
            $response = Http::withToken($this->config['api_key'])
                ->timeout($this->config['timeout'])
                ->post($this->config['endpoint'], [
                    'model' => $this->config['model'],
                    'temperature' => $this->config['temperature'],
                    // Best effort only: OpenAI may still answer differently, e.g. after a model update
                    'seed' => $this->config['seed'],
                    'max_tokens' => $this->config['max_tokens'],
                    'response_format' => [
                        'type' => 'json_schema',
                        'json_schema' => ['name' => 'answer', 'strict' => true, 'schema' => $schema],
                    ],
                    'messages' => [
                        ['role' => 'system', 'content' => $system],
                        ['role' => 'user', 'content' => $user],
                    ],
                ])
                ->throw();
        } catch (ConnectionException|RequestException $e) {
            report($e);

            throw new AnalyzerException('ai_unavailable', previous: $e);
        }

        $answer = json_decode((string) $response->json('choices.0.message.content'), true);

        if (!is_array($answer)) {
            throw new AnalyzerException('ai_bad_response');
        }

        return $answer;
    }
}
