@foreach($cssFiles as $cssFile)
  <link
    rel="preload"
    as="style"
    href="{{ asset(mix($cssFile)) }}"
  >
@endforeach

@foreach ($jsFiles as $jsFile)
  <link
    rel="preload"
    as="script"
    href="{{ asset(mix($jsFile)) }}"
  >
@endforeach

@foreach($cssFiles as $cssFile)
  <link
    rel="stylesheet"
    type="text/css"
    href="{{ asset(mix($cssFile)) }}"
  >
@endforeach
