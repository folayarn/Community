<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="manifest" href="/manifest.json">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>{{config('app.name','MyConnect')}}</title>
    </head>
    <body>
        <div class="container-fluid">
    @include('inc.navbar')

@yield('content')

        </div>
    </body>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script type="text/javascript">
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
    if ('serviceWorker' in navigator ) {
      window.addEventListener('load', function() {
          navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
              // Registration was successful
              console.log('ServiceWorker registration successful with scope: ', registration.scope);
          }, function(err) {
              // registration failed :(
              console.log('ServiceWorker registration failed: ', err);
          });
      });
  }
</script>
</html>





