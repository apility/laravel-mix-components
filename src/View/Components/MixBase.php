<?php


namespace Apility\LaravelMixComponents\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

abstract class MixBase extends Component
{
  /** @var bool */
  protected $isHot;

  /** @var Collection */
  protected $files;

  /** @var string|null */
  public $integrity;

  /** @var string|null */
  public $crossorigin;

  public function __construct($manifestDirectory = '', $integrity = null, $crossorigin = null)
  {
    if ($manifestDirectory && !Str::startsWith($manifestDirectory, '/')) {
      $manifestDirectory = "/{$manifestDirectory}";
    }

    $this->isHot = file_exists(public_path($manifestDirectory . '/hot'));

    $this->crossorigin = $crossorigin;

    $this->integrity = $integrity ? collect(explode(',', $integrity))
      ->map(function ($algorithm) {
        return $algorithm ? trim($algorithm) : $algorithm;
      })->filter(function ($algorithm) {
        return in_array($algorithm, hash_algos());
      }) : collect();

    $manifestPath = public_path($manifestDirectory . '/mix-manifest.json');

    $this->files = collect();

    if (file_exists($manifestPath)) {
      $this->files = collect(json_decode(file_get_contents($manifestPath), true))
        ->keys()
        ->groupBy(function ($key) {

          preg_match('/\.(\D+)$/', $key, $matches);

          return $matches[1];
        });
    }
  }

  public function integrityKey($file)
  {
    if ($this->integrity->count()) {
      $files = $this->files->flatten();
      if ($file = $files->first(function ($path) use ($file) {
        return $path === $file;
      })) {
        if (file_exists(public_path($file))) {
          $content = file_get_contents(public_path($file));
          $hashes = $this->integrity->map(function ($algorithm) use ($content) {
            return $algorithm . '-' . base64_encode(hash($algorithm, $content, true));
          });
          return $hashes->join(' ');
        }
      }
    }

    return null;
  }
}
