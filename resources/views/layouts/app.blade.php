<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- csrf token for ajax request  --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- the title  --}}
        <title>Project Flyer | @yield('title', 'home')</title>
        {{-- favicon  --}}
        <link rel="shortcut icon"   href="https://img.freepik.com/free-vector/grey-and-yellow-business-flyer-template_23-2147741058.jpg?size=338&ext=jpg">
        {{-- main css file  --}}
        <link rel="stylesheet" type="text/css" href="{{ css('app.css') }}">
        {{-- placeholder to add more inline style or link to files --}}
        @stack('styles')
    </head>
    <body>
        <div id="app">
            {{-- navbar  --}}
            @include('partials.nav')
            {{-- main content placeholder  --}}
            @yield('content')
        </div>
        {{-- sweet alert (temporary) --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        {{-- main js file --}}
        <script src="{{ js('app.js') }}"></script>
         {{-- placeholder to add more in-line scripts  or link to files --}}
        @stack('scripts')
        @include('partials.flash')
    </body>
</html>
