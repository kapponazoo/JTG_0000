@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')
 <h1 class="text-xl font-semibold my-10">{{ $user->name }}のプロフィール</h1>
 @if ($profile)
    <div class="relative items-center w-full px-5 mx-auto">
        <div class="lg:mx-auto flex flex-col w-full max-w-lg mb-12 text-center">
            @if ($profile->profile_image)
                <img alt="testimonial" class="inline-block object-cover object-center w-20 h-20 mx-auto mb-8 rounded-full" src="{{ asset('storage/' . $profile->profile_image) }}">
            @endif
            <p class="mx-auto text-base leading-relaxed text-gray-500">{{ $profile->description }}</p>
            <h2 class="text-lg font-semibold">投稿一覧</h2>
                
            <div class="mx-auto max-w-2xl px-4 py-12">
                <div class="grid gap-x-6 gap-y-10 grid-cols-4">
                    @foreach ($pieces as $piece)
                        <a href="{{ route('piece.show', $piece->id) }}" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                <img src="{{ asset('storage/' . $piece->image_path) }}" alt="{{ $piece->title }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- ログアウトリンク -->
            <div class="mt-4 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sky-600 hover:text-sky-900">ログアウト</button>
                </form>
            </div>

        @else
            <p class="my-20 text-center">プロフィールが作成されていません。</p>
            
            <div class="flex justify-center">
                <a href="{{ route('profile.create') }}" class="group relative w-full inline-flex h-12 items-center justify-center overflow-hidden rounded-lg bg-sky-500 px-6 font-medium m-4 text-neutral-50">
                    <span class="absolute h-56 w-full rounded-lg bg-neutral-950 transition-all duration-300 group-hover:h-0 group-hover:w-0"></span>
                    <span class="relative">プロフィールを作成する</span>
                </a>
            </div>
        @endif
        </div>
    </div>
@endsection
