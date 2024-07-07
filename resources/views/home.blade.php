@extends('layouts.app')

@section('title', 'ホーム')

@section('header')
<div class="header">
    <h1>JAPAN TEXTILE NEWS</h1>
    <p>布と糸の文化の情報サイト</p>
</div>
@endsection

@section('content')
<div class="container">
    <h2>今日の7枚</h2>
    <p>ランダムで7枚表示されます。クリックすると詳細を表示します。画像の上を指でスライドして閲覧できます。</p>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($pieces as $piece)
                <div class="swiper-slide">
                    <a href="#"><!-- ここに詳細ページへのリンクを追加 -->
                        <img src="{{ asset('storage/' . $piece->image_path) }}" alt="{{ $piece->title }}">
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="menu">
        <button onclick="location.href='/profile'">マイページ</button>
        <button onclick="location.href='/piece'">新規投稿</button>
        <button onclick="location.href='/search-by-location'">地域検索</button>
        <button onclick="location.href='/search-by-keyword'">キーワード検索</button>
        <button onclick="location.href='/information'">新着情報</button>
    </div>
</div>
@endsection

@section('footer')
<div class="footer-menu">
    <a href="/" class="footer-link"><i class="fas fa-home"></i> ホーム</a>
    <a href="/piece" class="footer-link"><i class="fas fa-bell"></i> 投稿</a>
    <a href="/information" class="footer-link"><i class="fas fa-envelope"></i> お知らせ</a>
    <a href="/profile" class="footer-link"><i class="fas fa-user"></i> プロフィール</a>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endsection

@section('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        loop: true,
    });
</script>
@endsection
