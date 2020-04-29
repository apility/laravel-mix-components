<?php

namespace Apility\LaravelMixComponents\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MixHead extends MixBase {
  public $cssFiles;
  public $jsFiles;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct () {
    parent::__construct();

    $this->cssFiles = $this->isHot ? collect() : $this->files->get('css');
    $this->jsFiles = $this->files->get('js');
  }

  public function render () {
    return view('almc::components.mix-head');
  }
}
