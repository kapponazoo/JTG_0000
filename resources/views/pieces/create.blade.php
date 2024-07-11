@extends('layouts.app')

@section('title', '新規投稿')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-6">新規投稿</h1>
    <form action="{{ route('piece.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="title" name="title" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">説明</label>
            <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="description" name="description" required></textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">画像</label>
            <input type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="image" name="image" required>
        </div>
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">撮影場所</label>
            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="location" name="location">
        </div>
        <div class="mb-4">
            <label for="prefecture" class="block text-sm font-medium text-gray-700">都道府県</label>
            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="prefecture" name="prefecture" required>
                <option value="">都道府県を選択</option>
                @foreach ($prefectures as $prefecture)
                    <option value="{{ $prefecture }}">{{ $prefecture }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700">種別</label>
            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="type" name="type" required>
                <option value="素材">素材</option>
                <option value="糸">糸</option>
                <option value="布">布</option>
                <option value="道具">道具</option>
                <option value="書籍">書籍</option>
                <option value="施設">施設</option>
                <option value="人">人</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium text-gray-700">タグ</label>
            <div class="mt-1">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_origin" name="tags_origin" placeholder="産地">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_material" name="tags_material" placeholder="素材">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_technique" name="tags_technique" placeholder="技法">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_tool" name="tags_tool" placeholder="道具">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_person" name="tags_person" placeholder="ひと">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_group" name="tags_group" placeholder="団体">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_event" name="tags_event" placeholder="イベント名">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_facility" name="tags_facility" placeholder="施設名">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_book" name="tags_book" placeholder="書籍名">
            </div>
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">表示開始</label>
            <input type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="start_date" name="start_date">
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">表示終了</label>
            <input type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="end_date" name="end_date">
        </div>
        <div class="mb-4">
            <label for="comments" class="block text-sm font-medium text-gray-700">コメント</label>
            <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="comments" name="comments"></textarea>
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">投稿内容を確認</button>
    </form>
</div>
@endsection
