<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="manifest.json"/>
    <!-- PWA APPLE -->    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Balance Manager">
    <link rel="apple-touch-icon" href="/css/icons/balanceManager.png">
    <!-- PWA MS -->
    <meta name="msapplication-TileImage" content="/css/icons/balanceManager.png">
    <meta name="msapplication-TileColor" content="#000">

    <title>{{ config('app.name', 'Laravel') }}</title>

<script>
  window.App = @json($appData); 
</script>

    <!-- Scripts -->
		{{-- @isset ($useVueJs) --}}
		<script src="{{ mix('js/app.js') }}" defer></script>
    <style>
      [v-cloak] > * {
        display: none;
      }
      [v-cloak]::before {
        content: "";
        display: block;
        width: 100px;
        height: auto;
        margin: auto;
        margin-top: 100px;
        /* background-image: url('/css/loadingInfinity.gif'); */
      }
    </style>
		{{-- @else --}}
		{{-- <script src="{{ asset('js/libraries/alpine.js') }}" defer></script> --}}
		{{-- @endisset --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{$layoutTheme}}">
    <div id="app" v-cloak>
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
		@include('layouts.footer')
</body>
</html>
