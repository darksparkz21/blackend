<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="blackend">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Androidizay') }}</title>
    <link rel="shortcut icon" href="{{{ asset('/favicon.ico') }}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customfonts.css') }}" rel="stylesheet">
    {{--Extended Styles--}}
    @yield('styles')
    
</head>
<body class="hero-home">
    <div id="app" class="hero-body">
        @yield('hero-header')
            <div class="main-nav">
                @include('inc.navbar')
            </div>
        <div id="bg-wrapper">
            <div class="container" id="hero-container">
                {{--Ai-Main--}}
                <div class="main-body">
                    @include('inc.messages')
                    @yield('mainhome')
                </div>
            </div>
        </div>
        @include('inc.footer')
    </div>
    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{--Extended Scripts--}}
    @yield('scripts')
</body>
</html>
