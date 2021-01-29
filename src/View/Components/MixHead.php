<?php

namespace Apility\LaravelMixComponents\View\Components;

class MixHead extends MixBase {
  public $cssFiles;
  public $jsFiles;

  /**
   * Create a new component instance.
   *
   * @param string $manifestDirectory
   */
  public function __construct ($manifestDirectory = '') {
    parent::__construct($manifestDirectory);

    $this->cssFiles = $this->files->get('css');
    $this->jsFiles = $this->files->get('js');
  }

  public function render () {
    return view('almc::components.mix-head');
  }
}
