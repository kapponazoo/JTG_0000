<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Piece;

class PieceController extends Controller
{
    public function index()
    {
        $pieces = Piece::all();
        return view('pieces.index', compact('pieces'));
    }

    public function create()
    {
        return view('pieces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 他のバリデーションルール
        ]);

        $piece = new Piece();
        $piece->title = $request->input('title');
        $piece->description = $request->input('description');
        // 他のフィールドの設定
        $piece->save();

        return redirect()->route('pieces.index')->with('success', 'Piece created successfully.');
    }

    public function show($id)
    {
        $piece = Piece::findOrFail($id);
        return view('pieces.show', compact('piece'));
    }

    public function edit($id)
    {
        $piece = Piece::findOrFail($id);
        return view('pieces.edit', compact('piece'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 他のバリデーションルール
        ]);

        $piece = Piece::findOrFail($id);
        $piece->title = $request->input('title');
        $piece->description = $request->input('description');
        // 他のフィールドの更新
        $piece->save();

        return redirect()->route('pieces.index')->with('success', 'Piece updated successfully.');
    }

    public function destroy($id)
    {
        $piece = Piece::findOrFail($id);
        $piece->delete();

        return redirect()->route('pieces.index')->with('success', 'Piece deleted successfully.');
    }
}
