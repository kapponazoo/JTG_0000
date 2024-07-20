<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\InfoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // 自分のプロフィール
    Route::get('/profile/{id}', [ProfileController::class, 'showOther'])->name('profile.showOther'); // 他のユーザーのプロフィール
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/points', [ProfileController::class, 'points'])->name('profile.points');
    Route::get('/profile/posts', [ProfileController::class, 'posts'])->name('profile.posts');
    Route::get('/profile/newpost', [ProfileController::class, 'newpost'])->name('profile.newpost');
});



// pieceの設定
Route::get('/pieces', [PieceController::class, 'index'])->name('piece.index');
Route::get('/pieces/create', [PieceController::class, 'create'])->name('piece.create');
Route::post('/pieces', [PieceController::class, 'store'])->name('piece.store');
Route::get('/pieces/{id}', [PieceController::class, 'show'])->name('piece.show');

// 認証不要のルート//
Route::get('/pieces', [PieceController::class, 'index'])->name('piece.index');
Route::get('/pieces/{id}', [PieceController::class, 'show'])->name('piece.show');
    
// 認証が必要なルート//
Route::middleware(['auth'])->group(function () {
Route::get('/pieces/create', [PieceController::class, 'create'])->name('piece.create');
Route::post('/pieces', [PieceController::class, 'store'])->name('piece.store');
});

Route::get('/info', [InfoController::class, 'index'])->name('info.index');

require __DIR__.'/auth.php';