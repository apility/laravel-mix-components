<?php

namespace Apility\LaravelMixComponents\View\Components;

use Illuminate\Support\Collection;

class MixBody extends MixBase
{
  /** @var Collection */
  public $jsFiles;
  public bool $defer;
  public bool $async;

  /**
   * Create a new component instance.
   *
   * @param string $manifestDirectory
   */
  public function __construct($manifestDirectory = '', $integrity = null, $crossorigin = null, $defer = false, $async = false)
  {
    parent::__construct($manifestDirectory, $integrity, $crossorigin);

    $this->jsFiles = $this->files->get('js', collect());
    $this->defer = $defer;
    $this->async = $async;
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
