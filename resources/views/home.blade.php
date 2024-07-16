@extends('layouts.app')

@section('title', 'ホーム')

@section('header')

    <h2>今日の7枚</h2>
    <p>ランダムで7枚表示されます。クリックすると詳細を表示します。画像の上を指でスライドして閲覧できます。</p>
@endsection

@section('content')
<div class="container mx-auto py-8">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($pieces as $piece)
                <div class="swiper-slide">
                    <div class="image-container">
                        <a href="{{ route('piece.show', $piece->id) }}">
                            <img src="{{ asset('storage/' . $piece->image_path) }}" alt="{{ $piece->title }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
@endsection

@section('footer')

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
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 1.3,
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
