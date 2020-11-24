<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('img/icon.jpg') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <title>Laravel</title>
    </head>
    <body>
        <div id="app">
        @yield('content')
        </div>
    </body>
    <script src="{{ asset('js/app.js') }}" type="text/javascript" charset="utf-8"></script>
</html>
