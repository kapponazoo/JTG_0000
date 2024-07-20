@extends('layouts.app')

@section('title', 'プロフィール作成')

@section('content')

    <h1 class="text-xl font-semibold mb-6">プロフィール作成</h1>
    @if ($errors->any())
        <div class="mb-4">
            <ul class="list-disc pl-5 text-red-500">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">役割</label>
            <select id="role" name="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-sky-500" required>
                <option value="布好きさん">布好きさん</option>
                <option value="作家">作家</option>
                <option value="講師">講師</option>
                <option value="ギャラリー">ギャラリー</option>
                <option value="コレクター">コレクター</option>
                <option value="研究者">研究者</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">自己紹介</label>
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-sky-500"></textarea>
        </div>
        <div class="mb-4">
            <label for="profile_image" class="block text-sm font-medium text-gray-700">プロフィール画像</label>
            <label class="dropimage">
    <input title="クリックまたはドロップしてください" type="file" id="profile_image" name="profile_image">
  </label>
        </div>
        <button class="group relative inline-flex h-12 items-center justify-center overflow-hidden rounded-lg bg-neutral-950 px-6 font-medium text-neutral-50 w-full"><span class="absolute h-0 w-0 rounded-lg bg-sky-500 transition-all duration-300 group-hover:h-56 group-hover:w-full"></span><span class="relative">作成</span></button>
    </form>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/picnic.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/picnic.js') }}"></script>
@endsection