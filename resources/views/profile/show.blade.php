@extends('layouts.app')

@section('title', $piece->title)

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-6">{{ $piece->title }}</h1>
    <img src="{{ asset('storage/' . $piece->image_path) }}" alt="{{ $piece->title }}" class="w-full h-auto mb-4">
    <p class="text-gray-700 mb-4">{{ $piece->description }}</p>
    <p class="text-gray-700 mb-4"><strong>撮影場所:</strong> {{ $piece->location }} ({{ $piece->prefecture }})</p>
    <p class="text-gray-700 mb-4"><strong>種別:</strong> {{ $piece->type }}</p>
    <p class="text-gray-700 mb-4"><strong>カテゴリ:</strong> {{ $piece->category->name }}</p>
    <p class="text-gray-700 mb-4"><strong>タグ:</strong> 
        @foreach ($piece->tags as $tag)
            <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->name }}</span>
        @endforeach
    </p>
    <p class="text-gray-700 mb-4"><strong>表示期間:</strong> {{ $piece->start_date }} - {{ $piece->end_date }}</p>
    <p class="text-gray-700 mb-4"><strong>コメント:</strong> {{ $piece->comments }}</p>
</div>
@endsection
