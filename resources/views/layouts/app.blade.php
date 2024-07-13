<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title', 'Laravel Project')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @yield('styles')
</head>
<body class="font-sans text-gray-900 antialiased">
    <div id="app">
        <header>
            <div>
                <a href="/">
                    <div class="m-10"><img src="/images/JTG_logo_w.png" alt="JAPAN TEXTILE GEEKS"></div>
                </a>
            </div>
            @yield('header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <div class="footer-menu">
                <a href="/" class="footer-link"><i class="fas fa-home"></i> ホーム</a>
                <a href="/pieces/create" class="footer-link"><i class="fas fa-bell"></i> 投稿</a>
                <a href="/pieces" class="footer-link"><i class="fas fa-envelope"></i> 新着情報</a>
                <a href="/profile" class="footer-link"><i class="fas fa-user"></i> プロフィール</a>
            </div>
            @yield('footer')
        </footer>
    </div>
    @yield('scripts')
</body>
</html>
