<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        {{-- favicon --}}
        <link rel="icon" type="image/png" href='/img/favicon.png' style="margin-top: -30px">

        <title>Fair Shoes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">

        <!-- Styles -->
    </head>
    <body>
        @yield('content')
        @yield('scripts')
    </body>
</html>
