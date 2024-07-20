@extends('layouts.app')

@section('title', $piece->title)

@section('content')
    <h1 class="text-2xl font-semibold mt-6">{{ $piece->title }}</h1>
    <div class="p-6">
    <img src="{{ asset('storage/' . $piece->image_path) }}" alt="{{ $piece->title }}" class="w-full mx-auto rounded-lg">
   <div class="mt-6 p-6 border-gray-400">
   
   <p class="border-gray-400"> {{ $piece->description }}</p>
   
   </div>
    <p class="mb-4 mt-6"><strong>カテゴリ:</strong> {{ $piece->category->name }}</p>
    <p class="mb-4"><strong>撮影場所:</strong> {{ $piece->location }}</p>
    <!--p class="mb-4"><strong>都道府県:</strong> {{ $piece->prefecture }}</p-->
    <p class="mb-4"><strong>種別:</strong> {{ $piece->type }}</p>
    <!--p class="mb-4"><strong>開始日:</strong> {{ $piece->start_date }}</p--
    <!p class="mb-4"><strong>終了日:</strong> {{ $piece->end_date }}</p-->
    <div class="mb-4">
        <strong>タグ:</strong>
        @foreach ($piece->tags as $tag)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $tag->name }}</span>
        @endforeach
    </div>
    </div>
    <a href="{{ url()->previous() }}" class="text-sky-600 hover:text-sky-900">戻る</a>

@endsection
