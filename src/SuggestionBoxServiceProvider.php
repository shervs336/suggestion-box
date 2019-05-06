<?php

namespace Shervs336\SuggestionBox;

use Illuminate\Support\ServiceProvider;
use Sherv336\SuggestionBox\Tools\Suggestion;

class SuggestionBoxServiceProvider extends ServiceProvider
{
  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__.'/../migrations');

    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    $this->loadViewsFrom(__DIR__.'/../resources/views', 'suggestion-box');

    $this->publishes([
      __DIR__.'/../resources/views' => base_path('resources/views/vendor/suggestion-box'),
    ], 'migration');
  }

  public function register()
  {
    $this->app->singleton(Suggestion::class, function () {
      return new Suggestion;
    });

    $this->app->alias(Suggestion::class, 'suggestion');
  }
}
