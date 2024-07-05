<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile; // プロフィールを取得
        $isOwner = true; // 自分のプロフィールであることを示す
        return view('profile.index', compact('user', 'profile', 'isOwner'));
    }

    public function showOther($id)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile; // プロフィールを取得
        $isOwner = false; // 他者のプロフィールであることを示す
        return view('profile.index', compact('user', 'profile', 'isOwner'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $profile->update($request->all());
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