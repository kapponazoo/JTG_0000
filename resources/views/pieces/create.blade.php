@extends('layouts.app')

@section('title', '新規投稿')

@section('content')
    <h1 class="text-xl font-semibold mb-6">新規投稿</h1>

    @if ($errors->any())
        <div class="mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
             <label class="dropimage">
    <input title="クリックまたは画像ドロップしてください" type="file" id="image" name="image" required>
  </label>
            
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
                <option value="">種別を選択</option>
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
            <label for="category_id" class="block text-sm font-medium text-gray-700">カテゴリ</label>
            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="category_id" name="category_id" required>
                <option value="">カテゴリを選択</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium text-gray-700">タグ (カンマ区切りで入力)</label>
            <div class="mt-1">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_origin" name="tags_origin" placeholder="産地 (カンマ区切りで入力)">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_material" name="tags_material" placeholder="素材 (カンマ区切りで入力)">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_technique" name="tags_technique" placeholder="技法 (カンマ区切りで入力)">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_tool" name="tags_tool" placeholder="道具 (カンマ区切りで入力)">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_person" name="tags_person" placeholder="ひと (カンマ区切りで入力)">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_group" name="tags_group" placeholder="団体 (カンマ区切りで入力)">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_event" name="tags_event" placeholder="イベント名 (カンマ区切りで入力)">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_facility" name="tags_facility" placeholder="施設名 (カンマ区切りで入力)">
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="tags_book" name="tags_book" placeholder="書籍名 (カンマ区切りで入力)">
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
    
   <button type="submit" class="group relative inline-flex h-12 items-center justify-center overflow-hidden rounded-lg bg-neutral-950 px-6 font-medium text-neutral-50 w-full"><span class="absolute h-0 w-0 rounded-lg bg-sky-500 transition-all duration-300 group-hover:h-56 group-hover:w-full"></span><span class="relative">投稿する</span></button>
   
   </form>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/picnic.css') }}">

@endsection

@section('scripts')
<script src="{{ asset('js/picnic.js') }}"></script>
@endsection