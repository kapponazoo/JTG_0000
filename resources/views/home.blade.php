@extends('layouts.app')

@section('title', 'ホーム')

@section('header')
    <p class="today7 text-2xl text-center mt-10">今日の7枚</p>
    <p class="text-sm text-center mb-10 mt-5">
        ランダムで7枚表示されます。<br>
        クリックすると情報が表示されます。<br>偶然の出会いから布について知りましょう。
    </p>
@endsection

@section('content')
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach ($pieces as $piece)
                <div class="swiper-slide" style="background-image:url('{{ asset("storage/" . $piece->image_path) }}')">
                    <a href="{{ route('piece.show', $piece->id) }}">
                        <div class="pieceone">{{ $piece->title }}</div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- ナビゲーションボタン -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- ページネーション -->
        <div class="swiper-pagination"></div>
    </div>
@endsection

@section('footer')
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper(".swiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
                clickable: true
            },
            loop: true, //繰り返し指定
            spaceBetween: 8, //スライド間の余白
            slidesPerView: 1.5, //一度に表示するスライド枚数
            centeredSlides: true, //スライダーの最初と最後に余白を追加せずスライドが真ん中に配置される
            centeredSlidesBounds: true //アクティブなスライドを中央に配置
        });
    });
</script>
@endsection
