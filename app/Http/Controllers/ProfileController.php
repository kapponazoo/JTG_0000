<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $profile = new UserProfile([
            'user_id' => Auth::id(),
            'role' => $request->role,
            'description' => $request->description,
        ]);

        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            $profile->profile_image = $profileImagePath;
        }

        $profile->save();

        return redirect()->route('profile.show')->with('success', 'プロフィールが作成されました。');
    }

public function show()
{
    $user = Auth::user();
    $profile = $user->profile;
    $pieces = $user->pieces;

    return view('profile.show', compact('user', 'profile', 'pieces'));
}

    


    public function showOther($id)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile;

        return view('profile.show', compact('user', 'profile'));
    }

    // 他の必要なメソッドも追加
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('profile.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $profile->update([
            'role' => $request->role,
            'description' => $request->description,
        ]);

        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            $profile->profile_image = $profileImagePath;
        }

        return redirect()->route('profile.show')->with('success', 'プロフィールが更新されました。');
    }
}
