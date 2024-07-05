<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|in:布好きさん, 作家, 講師, ギャラリー, コレクター, 研究者',
            'description' => 'nullable|string',
            // 他のバリデーションルール
        ]);

        $profile = new UserProfile();
        $profile->user_id = Auth::id();
        $profile->role = $request->input('role');
        $profile->description = $request->input('description');
        // 他のフィールドの設定
        $profile->save();

        return redirect('/profile')->with('status', 'プロフィールが作成されました');
    }

    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'role' => 'required|in:布好きさん, 作家, 講師, ギャラリー, コレクター, 研究者',
            'description' => 'nullable|string',
            // 他のバリデーションルール
        ]);

        $profile = Auth::user()->profile;
        $profile->role = $request->input('role');
        $profile->description = $request->input('description');
        // 他のフィールドの更新
        $profile->save();

        return redirect('/profile')->with('status', 'プロフィールが更新されました');
    }
}