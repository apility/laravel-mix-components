@foreach ($jsFiles as $jsFile)
  <script src="{{ asset(mix($jsFile)) }}"></script>
@endforeach
