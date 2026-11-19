<?php

declare(strict_types=1);

namespace Yu\SeoMetaAnalyzer;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Yu\SeoMetaAnalyzer\Livewire\SeoMetaAnalyzerComponent;
use Yu\SeoMetaAnalyzer\Llm\LlmProvider;

class SeoMetaAnalyzerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/seo-meta-analyzer.php', 'seo-meta-analyzer');

        $this->app->bind(LlmProvider::class, function ($app): LlmProvider {
            $config = config('seo-meta-analyzer.providers.'.config('seo-meta-analyzer.provider'));

            return $app->make($config['class'], ['config' => $config]);
        });
        parent::register();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'seo-meta-analyzer');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'seo-meta-analyzer');
        Livewire::component('seo-meta-analyzer', SeoMetaAnalyzerComponent::class);
    }
}
