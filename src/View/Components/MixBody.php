<?php

namespace Apility\LaravelMixComponents\View\Components;

class MixBody extends MixBase {
  public $jsFiles;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct () {
    parent::__construct();

    $this->jsFiles = $this->files->get('js');
  }

  public function render () {
    return view('almc::components.mix-body');
  }
}
