<?php

namespace Apility\LaravelMixComponents\View\Components;

use Illuminate\Support\Collection;
class MixHead extends MixBase
{
  /** @var Collection */
  public $cssFiles;

  /** @var Collection */
  public $jsFiles;

  /** @var bool */
  public $preload = false;

  /**
   * Create a new component instance.
   *
   * @param string $manifestDirectory
   */
  public function __construct($manifestDirectory = '', $integrity = null, $crossorigin = null, $preload = false)
  {
    parent::__construct($manifestDirectory, $integrity, $crossorigin);

    $this->preload = $preload;
    $this->cssFiles = $this->isHot ? collect() : $this->files->get('css', collect());
    $this->jsFiles = $this->files->get('js', collect());
  }

  public function shouldRender()
  {
    return ($this->cssFiles->count() + $this->jsFiles->count()) > 0;
  }

  public function render()
  {
    return view('almc::components.mix-head');
  }
}
