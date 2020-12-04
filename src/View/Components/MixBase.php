<?php


namespace Apility\LaravelMixComponents\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class MixBase extends Component {
  protected $isHot;
  protected $files;

  public function __construct ($manifestDirectory = '') {
    if ($manifestDirectory && !Str::startsWith($manifestDirectory, '/')) {
      $manifestDirectory = "/{$manifestDirectory}";
    }

    $this->isHot = file_exists(public_path($manifestDirectory . '/hot'));

    $manifestPath = public_path($manifestDirectory . '/mix-manifest.json');

    $this->files = collect(json_decode(file_get_contents($manifestPath), true))
      ->keys()
      ->groupBy(function ($key) {

        preg_match('/\.(\D+)$/', $key, $matches);

        return $matches[1];
      });
  }
}
