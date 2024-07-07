@extends('layouts.app')

@section('title', '新規投稿')

@section('content')
<div class="container">
    <h1>新規投稿</h1>
    <form action="{{ route('piece.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">説明</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">画像</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="location">撮影場所</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>
        <div class="form-group">
            <label for="type">種別</label>
            <select class="form-control" id="type" name="type" required>
                <option value="展示">展示</option>
                <option value="販売">販売</option>
                <option value="その他">その他</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">分類</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">タグ</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">表示開始</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
        <div class="form-group">
            <label for="end_date">表示終了</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
        <div class="form-group">
            <label for="comments">コメント</label>
            <textarea class="form-control" id="comments" name="comments"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">投稿内容を確認</button>
    </form>
</div>
@endsection
