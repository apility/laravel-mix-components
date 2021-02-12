<?php

namespace Apility\LaravelMixComponents\View\Components;

use Illuminate\Support\Collection;

class MixBody extends MixBase
{
  /** @var Collection */
  public $jsFiles;

  /**
   * Create a new component instance.
   *
   * @param string $manifestDirectory
   */
  public function __construct($manifestDirectory = '', $integrity = null, $crossorigin = null)
  {
    parent::__construct($manifestDirectory, $integrity, $crossorigin);

    $this->jsFiles = $this->files->get('js', collect());
  }

  public function shouldRender()
  {
    return $this->jsFiles->count() > 0;
  }

  public function render()
  {
    return view('almc::components.mix-body');
  }
}
