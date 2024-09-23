<?php

namespace App\Http\Controllers;

use App\Models\BookStore;
use App\Models\User;

use Illuminate\Http\Request;

class BookStoreController extends Controller
{

    public function index()
    {
        $bookstores = BookStore::all();
        return view('bookstores.index', compact('bookstores'));

    }

    public function show($id)
    {
        $bookstore = BookStore::findOrFail($id);
        $user = $bookstore->user;

        //イチオシレビュー表示の情報取得
        $userFavoriteReview = $user->favoriteReviews()
            ->select('reviews.id', 'reviews.review_title', 'reviews.review_text','reviews.novel_id')
            ->with('novel:id,novel_title') 
            ->first();

            // ユーザーの全てのレビューを取得
    $reviews = $user->reviews()
        ->select('id', 'review_title', 'review_text', 'novel_id')
        ->with('novel:id,novel_title')
        ->get();
        

        return view('bookstores.show')->with([
        
        'bookstore_name'=>$bookstore->bookstore_name,
        'bookstore_introduction' => $bookstore->bookstore_introduction,

        'name' => $user->name,

        'reviews' => $reviews,

        'favorite_review_title' => $userFavoriteReview ? $userFavoriteReview->review_title : null,
        'favorite_review_text' => $userFavoriteReview ? $userFavoriteReview->review_text : null, 
        'favorite_novel_title' => $userFavoriteReview ? $userFavoriteReview->novel->novel_title : null, 
         'favorite_novel_id' => $userFavoriteReview ? $userFavoriteReview->novel_id : null, // この行を追加      

        ]);
    }
}