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
                <a href="{{ route('piece.show', $piece->id) }}">
                    <div class="swiper-slide" style="background-image:url('{{ asset("storage/" . $piece->image_path) }}')">
                        {{ $piece->title }}
                    </div>
                </a>
            @endforeach
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
@endsection

@section('footer')
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/swiper.js') }}"></script>
@endsection
