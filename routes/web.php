<?php

use App\Http\Controllers\BookstoreController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Models\Review;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/novels/show', [ReviewController::class, 'create'])
    ->name('review.create')
    ->middleware(['auth', 'verified']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

// web.php

// 小説表示処理
Route::get('/novels', [NovelController::class, 'index']);
Route::get('/novels/{id}', [NovelController::class, 'show'])->name('novels.show');

// レビュー投稿処理（変更あり）
Route::post('/novels/{id}', [ReviewController::class, 'store'])
    ->name('review.store')
    ->middleware(['auth', 'verified']);

//bookstore表示処理
Route::get('/bookstore', [BookstoreController::class, 'index']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
