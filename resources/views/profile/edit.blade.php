@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
<div class="container">
    <h1>プロフィール編集</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="role">役割</label>
            <select id="role" name="role" required>
                <option value="布好きさん" {{ $profile->role == '布好きさん' ? 'selected' : '' }}>布好きさん</option>
                <option value="作家" {{ $profile->role == '作家' ? 'selected' : '' }}>作家</option>
                <option value="講師" {{ $profile->role == '講師' ? 'selected' : '' }}>講師</option>
                <option value="ギャラリー" {{ $profile->role == 'ギャラリー' ? 'selected' : '' }}>ギャラリー</option>
                <option value="バイヤー" {{ $profile->role == 'バイヤー' ? 'selected' : '' }}>バイヤー</option>
                <option value="コレクター" {{ $profile->role == 'コレクター' ? 'selected' : '' }}>コレクター</option>
                <option value="研究者" {{ $profile->role == '研究者' ? 'selected' : '' }}>研究者</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="description">自己紹介</label>
            <textarea id="description" name="description">{{ $profile->description }}</textarea>
        </div>
        <!-- 他のフィールド -->
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection