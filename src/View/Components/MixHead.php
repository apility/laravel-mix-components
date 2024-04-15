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

  public string $type;

  /**
   * Create a new component instance.
   *
   * @param string $manifestDirectory
   */
  public function __construct($manifestDirectory = '', $integrity = null, $crossorigin = null, $preload = false, string $type = 'both')
  {
    parent::__construct($manifestDirectory, $integrity, $crossorigin);

    $this->preload = $preload;
    $this->type = $type;
    $this->cssFiles = in_array($type, ['css', 'both']) ? ($this->isHot ? collect() : $this->files->get('css', collect())) : collect();
    $this->jsFiles = in_array($type, ['js', 'both']) ? ($this->files->get('js', collect())) : collect();
  }

  public function shouldRender()
  {
    if ($this->type === 'both') {
      return ($this->cssFiles->count() + $this->jsFiles->count()) > 0;
    }

    return $this->cssFiles->count() > 0 || $this->jsFiles->count() > 0;
  }

  public function render()
  {
    return view('almc::components.mix-head');
  }
}
