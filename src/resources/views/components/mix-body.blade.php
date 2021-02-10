@foreach ($jsFiles as $jsFile)
  <script 
    src="{{ asset(mix($jsFile)) }}"
    integrity="{{ $integrityKey($jsFile) }}"
  ></script>
@endforeach
