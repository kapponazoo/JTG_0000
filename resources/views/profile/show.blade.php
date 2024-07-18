@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')

    <h1 class="text-xl font-semibold mb-6">{{ $user->name }}のプロフィール</h1>
    @if ($profile)
        <p>{{ $profile->description }}</p>
        @if ($profile->profile_image)
            <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="プロフィール画像">
        @endif
        <h2>投稿一覧</h2>
        <ul>
            @foreach ($pieces as $piece)
                <li>{{ $piece->title }}</li>
            @endforeach
        </ul>
    @else
        <p class="my-20 text-center">プロフィールが作成されていません。</p>
        
        <button onclick="{{ route('profile.create') }}" class="group relative inline-flex h-12 items-center justify-center overflow-hidden rounded-md bg-sky-500 px-6 font-medium text-neutral-50"><span class="absolute h-56 w-32 rounded-full bg-neutral-950 transition-all duration-300 group-hover:h-0 group-hover:w-0"></span><span class="relative">プロフィールを作成する</span></button>

    @endif

@endsection