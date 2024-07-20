@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')

    <h1 class="text-xl font-semibold my-10">{{ $user->name }}のプロフィール</h1>
    @if ($profile)
       <p class="border-gray-400">{{ $profile->description }}</p>
        @if ($profile->profile_image)
            <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="プロフィール画像">
        @endif
        <h2 class="text-lg font-semibold">投稿一覧</h2>
        <ul>
            @foreach ($pieces as $piece)
                <li>{{ $piece->title }}</li>
            @endforeach
        </ul>
    @else
        <p class="my-20 text-center">プロフィールが作成されていません。</p>
        
        <div class="flex justify-center">
    <a href="{{ route('profile.create') }}" class="group relative w-full inline-flex h-12 items-center justify-center overflow-hidden rounded-lg bg-sky-500 px-6 font-medium m-4 text-neutral-50">
        <span class="absolute h-56 w-full rounded-lg bg-neutral-950 transition-all duration-300 group-hover:h-0 group-hover:w-0"></span>
        <span class="relative">プロフィールを作成する</span>
    </a>
</div>
    @endif

@endsection