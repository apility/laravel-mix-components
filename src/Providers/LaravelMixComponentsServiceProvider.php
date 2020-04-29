<?php

namespace Apility\LaravelMixComponents\Providers;

use Apility\LaravelMixComponents\View\Components\MixHead;
use Apility\LaravelMixComponents\View\Components\MixBody;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class LaravelMixComponentsServiceProvider extends ServiceProvider {
  public function register () {
    View::addNamespace('almc', __dir__ . '/../resources/views');

    Blade::component(MixHead::class);
    Blade::component(MixBody::class);
  }
}
