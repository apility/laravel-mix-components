<?php

namespace Apility\LaravelMixComponents\View\Components;

class MixBody extends MixBase {
  public $jsFiles;

  /**
   * Create a new component instance.
   *
   * @param string $manifestDirectory
   */
  public function __construct ($manifestDirectory = '') {
    parent::__construct($manifestDirectory);

    $this->jsFiles = $this->files->get('js');
  }

  public function render () {
    return view('almc::components.mix-body');
  }
}
