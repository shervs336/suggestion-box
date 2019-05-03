<?php

namespace Shervs336\SuggestionBox;

use Illuminate\Support\ServiceProvider;

class SuggestionBoxServiceProvider extends ServiceProvider
{
  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

    $this->loadRoutesFrom(__DIR__.'/routes/web.php');

    $this->loadViewsFrom(__DIR__.'/resources/views', 'suggestion-box');

    $this->publishes([
      __DIR__.'/resources/views' => base_path('resources/views/vendor/suggestion-box'),
    ]);
  }

  public function register()
  {

  }
}
