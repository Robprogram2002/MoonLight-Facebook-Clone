<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @livewireScripts
    <script src="https://kit.fontawesome.com/8c76382a5a.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    @livewireStyles
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/notifications.css') }}" rel="stylesheet">
    @yield('links_css')
    
</head>
<body>
    @livewire('search-component', ['user' => Auth::user()])

    <div class="content-body">
        @yield('content_body')
    </div>

    @yield('scripts')
</body>
</html>
