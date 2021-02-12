@foreach ($jsFiles as $jsFile)
  <script 
    src="{{ asset(mix($jsFile)) }}"
    @if($integrity->count())
    integrity="{{ $integrityKey($jsFile) }}"
    @endif
    @if($crossorigin)
    crossorigin="{{ $crossorigin }}"
    @endif
  ></script>
@endforeach
