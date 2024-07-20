@extends('layouts.app')

@section('title', 'プロフィール')

@section('header')
<div class="back-button">&lt; <a href="/">戻る</a></div>
<h1 class="text-2xl font-semibold mt-6">プロフィール</h1>
<div class="back-button" style="visibility: hidden;">&lt;</div>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="profile">
    <img src="{{ asset('images/profile_picture.jpg') }}" alt="プロフィール画像" class="profile-image">
    <h2>{{ $user->name }}</h2>
    @if ($isOwner)
        <div class="buttons">
            <button onclick="location.href='pieces/create'">新規投稿</button>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
    @endif
    
</div>
@endsection

@section('styles')

@endsection