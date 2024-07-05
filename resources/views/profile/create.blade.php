@extends('layouts.app')

@section('title', 'プロフィール作成')

@section('content')
<div class="container">
    <h1>プロフィール作成</h1>
    <form action="{{ route('profile.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">役割</label>
            <select id="role" name="role" required>
                <option value="布好きさん">布好きさん</option>
                <option value="作家">作家</option>
                <option value="講師">講師</option>
                <option value="ギャラリー">ギャラリー</option>
                <option value="コレクター">コレクター</option>
                <option value="研究者">研究者</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">自己紹介</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <!-- 他のフィールド -->
        <button type="submit" class="btn btn-primary">作成</button>
    </form>
</div>
@endsection