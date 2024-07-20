@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')

    <h1 class="text-2xl font-semibold mt-6">投稿一覧</h1>
    @if ($pieces->isEmpty())
        <p>まだ投稿がありません。</p>
    @else
       
  <div class="mx-auto max-w-2xl px-4 py-12">
    
    <div class="grid gap-x-6 gap-y-10 grid-cols-4">

            @foreach ($pieces as $piece)
                
       <a href="{{ route('piece.show', $piece->id) }}" class="group">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
          <img src="{{ asset('storage/' . $piece->image_path) }}" alt="{{ $piece->title }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
   
      </a>
            @endforeach
    </div>


    @endif
</div>
<!-- ページングリンク -->
     <div class="pagination-container block text-center mt-4">
        {{ $pieces->links() }}
    </div>
@endsection
