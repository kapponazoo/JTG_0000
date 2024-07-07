<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//ログイン後のUSerProfile関係
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/points', [ProfileController::class, 'points'])->name('profile.points');
    Route::get('/profile/posts', [ProfileController::class, 'posts'])->name('profile.posts');
    Route::get('/profile/newpost', [ProfileController::class, 'newpost'])->name('profile.newpost');
});
Route::get('/profile/{id}', [ProfileController::class, 'showOther'])->name('profile.showOther');

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('pieces', PieceController::class);
    Route::resource('tags', TagController::class);
    Route::resource('tools', ToolController::class);
    Route::resource('books', BookController::class);
    Route::resource('workshops', WorkshopController::class);
    Route::resource('exhibitions', ExhibitionController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('points', PointController::class);
    Route::resource('posts', PostController::class);
    Route::resource('applications', ApplicationController::class);
});

//pieceの設定
Route::middleware(['auth'])->group(function () {
    Route::get('/piece', [PieceController::class, 'create'])->name('piece.create');
    Route::post('/piece', [PieceController::class, 'store'])->name('piece.store');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
require __DIR__.'/auth.php';
