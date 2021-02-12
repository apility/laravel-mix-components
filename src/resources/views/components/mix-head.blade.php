@foreach($cssFiles as $cssFile)
  <link
    rel="preload"
    as="style"
    href="{{ asset(mix($cssFile)) }}"
    @if($integrity->count())
    integrity="{{ $integrityKey($cssFile) }}"
    @endif
    @if($crossorigin)
    crossorigin="{{ $crossorigin }}"
    @endif
  >
@endforeach

@foreach ($jsFiles as $jsFile)
  <link
    rel="preload"
    as="script"
    href="{{ asset(mix($jsFile)) }}"
    @if($integrity->count())
    integrity="{{ $integrityKey($jsFile) }}"
    @endif
    @if($crossorigin)
    crossorigin="{{ $crossorigin }}"
    @endif
  >
@endforeach

@foreach($cssFiles as $cssFile)
  <link
    rel="stylesheet"
    type="text/css"
    href="{{ asset(mix($cssFile)) }}"
    @if($integrity->count())
    integrity="{{ $integrityKey($cssFile) }}"
    @endif
    @if($crossorigin)
    crossorigin="{{ $crossorigin }}"
    @endif
  >
@endforeach
