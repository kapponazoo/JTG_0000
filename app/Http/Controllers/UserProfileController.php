<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;
        $isOwner = true;
        return view('profile.index', compact('user', 'profile', 'isOwner'));
    }

    public function showOther($id)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile;
        $isOwner = false;
        return view('profile.index', compact('user', 'profile', 'isOwner'));
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;
        return view('profile.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'role' => 'required|in:布好きさん, 作家, 講師, ギャラリー, バイヤー, コレクター, 研究者',
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

    public function points()
    {
        $user = Auth::user();
        $points = $user->points;
        return view('profile.points', compact('user', 'points'));
    }

    public function posts()
    {
        $user = Auth::user();
        $posts = $user->posts;
        return view('profile.posts', compact('user', 'posts'));
    }

    public function newpost()
    {
        return view('profile.newpost');
    }
}
