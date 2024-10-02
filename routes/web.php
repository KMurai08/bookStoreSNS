<?php

use App\Http\Controllers\BookstoreController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


//最初の画面に本屋一覧を表示
Route::get('/', [BookStoreController::class, 'index']);
Route::get('/bookstores', [BookstoreController::class, 'index'])->name('bookstores.index');
//一覧にある本屋をクリックでその本屋の詳細画面へ移動
Route::get('/bookstore/{id}',[BookstoreController::class,'show'])->name('bookstores.show');
//ログインしているユーザーが自分の本屋へ移動
Route::get('/bookstore/{bookstore}', 'BookstoreController@show')->name('mybookstores.show');
//本屋編集など
Route::get('/bookstore/{bookstore}/edit', [BookstoreController::class, 'edit'])->name('bookstores.edit')->middleware('auth');
Route::put('/bookstores/{bookstore}', [BookstoreController::class, 'update'])->name('bookstores.update');
//本屋詳細ページでユーザーごと本屋削除処理
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// 小説表示処理
Route::get('/novels', [NovelController::class, 'index'])->name('novels.index');
Route::get('/novels/create', [NovelController::class, 'create'])->name('novels.create');
Route::get('/novels/{id}', [NovelController::class, 'show'])->name('novels.show');

// レビュー投稿処理
Route::post('/novels/{id}', [ReviewController::class, 'store'])
    ->name('review.store')
    ->middleware(['auth', 'verified']);
 //小説詳細ページでレビューを表示する
Route::get('/novels/show', [ReviewController::class, 'create'])
    ->name('review.create')
    ->middleware(['auth', 'verified']);
//レビュー詳細画面表示と編集・削除処理
Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
//ユーザー一覧など（未使用）
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);



//laravelBreeze関連
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
