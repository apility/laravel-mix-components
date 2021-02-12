@foreach($cssFiles as $cssFile)
  <link
    rel="preload"
    as="style"
    href="{{ asset(mix($cssFile)) }}"
    integrity="{{ $integrityKey($cssFile) }}"
    crossorigin="{{ $crossorigin }}"
  >
@endforeach

@foreach ($jsFiles as $jsFile)
  <link
    rel="preload"
    as="script"
    href="{{ asset(mix($jsFile)) }}"
    integrity="{{ $integrityKey($jsFile) }}"
    crossorigin="{{ $crossorigin }}"
  >
@endforeach

@foreach($cssFiles as $cssFile)
  <link
    rel="stylesheet"
    type="text/css"
    href="{{ asset(mix($cssFile)) }}"
    integrity="{{ $integrityKey($cssFile) }}"
    crossorigin="{{ $crossorigin }}"
  >
@endforeach
