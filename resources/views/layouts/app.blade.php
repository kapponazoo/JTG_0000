<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel Project')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('styles')
</head>
<body>
    <div id="app">
        <header>
                   <div>
            <a href="/">
                <x-application-logo-w class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
            @yield('header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
