@foreach ($jsFiles as $jsFile)
  <script 
    src="{{ asset(mix($jsFile)) }}"
    @if($integrity->count())
    integrity="{{ $integrityKey($jsFile) }}"
    @endif
    @if($crossorigin)
    crossorigin="{{ $crossorigin }}"
    @endif
    @if($defer)
    defer
    @endif
    @if($async)
    async
    @endif
  ></script>
@endforeach
