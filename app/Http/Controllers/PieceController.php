<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piece;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PieceController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        $prefectures = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県',
            '岐阜県', '静岡県', '愛知県', '三重県',
            '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
            '鳥取県', '島根県', '岡山県', '広島県', '山口県',
            '徳島県', '香川県', '愛媛県', '高知県',
            '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県',
            '沖縄県'
        ];

        return view('pieces.create', compact('categories', 'tags', 'prefectures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable|string',
            'prefecture' => 'required|string',
            'type' => 'required|string',
            'tags_origin' => 'nullable|string',
            'tags_material' => 'nullable|string',
            'tags_technique' => 'nullable|string',
            'tags_tool' => 'nullable|string',
            'tags_person' => 'nullable|string',
            'tags_group' => 'nullable|string',
            'tags_event' => 'nullable|string',
            'tags_facility' => 'nullable|string',
            'tags_book' => 'nullable|string',
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
            'prefecture' => $request->prefecture,
            'type' => $request->type,
            'user_id' => Auth::id(),
            
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $tags = [];
        $tagFields = [
            'tags_origin' => '産地', 'tags_material' => '素材', 'tags_technique' => '技法',
            'tags_tool' => '道具', 'tags_person' => 'ひと', 'tags_group' => '団体',
            'tags_event' => 'イベント名', 'tags_facility' => '施設名', 'tags_book' => '書籍名'
        ];

        foreach ($tagFields as $tagField => $category) {
            if ($request->filled($tagField)) {
                $tagNames = explode(',', $request->$tagField);
                foreach ($tagNames as $tagName) {
                    $tag = Tag::firstOrCreate(['name' => trim($tagName), 'category' => $category]);
                    $tags[] = $tag->id;
                }
            }
        }

        if (!empty($tags)) {
            $piece->tags()->attach($tags);
        }

        return redirect()->route('piece.show', $piece->id)->with('success', '新規投稿が作成されました。');
    }

    public function show($id)
    {
        $piece = Piece::with('tags', 'category')->findOrFail($id);
        return view('pieces.show', compact('piece'));
    }

    public function index()
{
    $pieces = Piece::paginate(12);
    return view('pieces.index', compact('pieces'));
}
}
