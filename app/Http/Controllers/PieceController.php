<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piece;
use App\Models\Category; // Categoryモデルをインポート
use App\Models\Tag; // Tagモデルをインポート
use Illuminate\Support\Facades\Auth;

class PieceController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // カテゴリーを取得
        $tags = Tag::all(); // タグを取得
        return view('pieces.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        //dd($request->all()); // ここで入力データをダンプして確認する

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable|string',
            'type' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $imagePath = $request->file('image')->store('pieces', 'public');

        $piece = Piece::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'type' => $request->type,
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        if ($request->has('tags')) {
            $piece->tags()->attach($request->tags);
        }

        return redirect('/')->with('success', '新規投稿が作成されました。');
    }
}
