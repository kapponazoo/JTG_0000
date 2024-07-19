<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Project')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    @yield('styles')
</head>
<body class="flex flex-col min-h-screen">
    <div class="wrapper shadow-lg border flex flex-col justify-between mx-auto">
        <header class="flex-grow-0">
            <h1 class="text-center mt-10">
                <a href="/">
                    <img src="/images/JTG_logo_w.png" alt="JAPAN TEXTILE GEEKS" width="100%">
                </a>
            </h1>
            @yield('header')
        </header>
        <main class="flex-grow overflow-y-auto p-6">
            @yield('content')
        </main>
        <footer class="footer-menu mizuiro flex-shrink-0">
            <a href="/" class="footer-link"><i class="fas fa-home"></i> ホーム</a>
            <a href="/profile" class="footer-link"><i class="fas fa-user"></i>マイページ</a>
            <a href="/pieces/create" class="footer-link"><i class="fas fa-pen"></i> 投稿</a>
            <a href="/pieces" class="footer-link"><i class="fas fa-layer-group"></i> 一覧</a>
            <a href="/info" class="footer-link"><i class="fas fa-user"></i> お知らせ</a>
        </footer>
    </div>
    
</div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
