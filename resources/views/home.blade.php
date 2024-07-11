@extends('layouts.app')

@section('title', 'ホーム')

@section('header')
    <h2>今日の7枚</h2>
    <p>ランダムで7枚表示されます。クリックすると詳細を表示します。画像の上を指でスライドして閲覧できます。</p>
@endsection

@section('content')
<div class="container">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($pieces as $piece)
                <div class="swiper-slide">
                    <a href="#"><!-- ここに詳細ページへのリンクを追加 -->
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $piece->image_path) }}" alt="{{ $piece->title }}">
                        </div>
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
<link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endsection

@section('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 7,
                    spaceBetween: 30,
                },
            }
        });
    });
</script>
@endsection
