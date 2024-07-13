@extends('layouts.app')

@section('title', $piece->title)

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-6">{{ $piece->title }}</h1>
    <img src="{{ asset('storage/' . $piece->image_path) }}" alt="{{ $piece->title }}" class="mb-6">
    <p class="mb-4"><strong>説明:</strong> {{ $piece->description }}</p>
    <p class="mb-4"><strong>カテゴリ:</strong> {{ $piece->category->name }}</p>
    <p class="mb-4"><strong>撮影場所:</strong> {{ $piece->location }}</p>
    <p class="mb-4"><strong>都道府県:</strong> {{ $piece->prefecture }}</p>
    <p class="mb-4"><strong>種別:</strong> {{ $piece->type }}</p>
    <p class="mb-4"><strong>開始日:</strong> {{ $piece->start_date }}</p>
    <p class="mb-4"><strong>終了日:</strong> {{ $piece->end_date }}</p>
    <div class="mb-4">
        <strong>タグ:</strong>
        @foreach ($piece->tags as $tag)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $tag->name }}</span>
        @endforeach
    </div>
    <a href="{{ url()->previous() }}" class="text-indigo-600 hover:text-indigo-900">戻る</a>
</div>
@endsection
