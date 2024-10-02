<?php

namespace App\Http\Controllers;

use App\Models\Bookstore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;



class BookstoreController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {

        $bookstores = Bookstore::with('user')->get();

        $bookstoresData = $bookstores->map(function ($bookstore) {
            $user = $bookstore->user;
            $userFavoriteReview = $user->favoriteReviews()
                ->select('reviews.id', 'reviews.review_title', 'reviews.review_text', 'reviews.novel_id')
                ->with('novel:id,novel_title')
                ->first();

            return [
                'bookstore' => $bookstore,
                'user' => $user,
                'favorite_review' => $userFavoriteReview,
            ];
        });

        return view('bookstores.index', compact('bookstoresData'));
 
    }
    public function show($id)
    {
        $bookstore = Bookstore::findOrFail($id);
        $canEdit = Auth::check() && Auth::id() === $bookstore->user_id;
        //どのユーザーの本屋か取得
        $user = $bookstore->user;
        //イチオシレビュー表示の情報取得
        $userFavoriteReview = $user->favoriteReviews()
            ->select('reviews.id', 'reviews.review_title', 'reviews.review_text','reviews.novel_id')
            ->with('novel:id,novel_title,novel_introduction') 
            ->first();
        // ユーザーの全てのレビューを取得
        $reviews = $user->reviews()
        ->select('id', 'review_title', 'review_text', 'novel_id')
        ->with('novel:id,novel_title')
        ->get();

        
        return view('bookstores.show')->with([

        'id'=>$bookstore->id,
        'bookstore_name'=>$bookstore->bookstore_name,
        'bookstore_introduction' => $bookstore->bookstore_introduction,
        'name' => $user->name,
        'reviews' => $reviews,
        'canEdit' => $canEdit,
        'favorite_review_title' => $userFavoriteReview ? $userFavoriteReview->review_title : null,
        'favorite_review_text' => $userFavoriteReview ? $userFavoriteReview->review_text : null, 
        'favorite_novel_title' => $userFavoriteReview ? $userFavoriteReview->novel->novel_title : null,
        'favorite_novel_introduction' => $userFavoriteReview ? $userFavoriteReview->novel->novel_introduction : null, 
        'favorite_novel_id' => $userFavoriteReview ? $userFavoriteReview->novel_id : null,      

        ]);
    }
            public function edit(Bookstore $bookstore)
        {
            
            $this->authorize('update', $bookstore);
        return view('bookstores.edit', compact('bookstore'));
        }

        public function update(Request $request, Bookstore $bookstore)
        {
            $this->authorize('update', $bookstore);

            $validated = $request->validate([
             'bookstore_name' => 'required|max:30',
             'bookstore_introduction' => 'nullable',
             'url' => 'nullable|url',
            ]);

            $bookstore->update($validated);

            return redirect()->route('bookstores.show', $bookstore)->with('success', '書店情報が更新されました。');
        }






}