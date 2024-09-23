<?php

namespace App\Http\Controllers;
use App\Models\Novel;
use App\Models\User;
use App\Models\Review;

use Illuminate\Http\Request;

class NovelController extends Controller
{
    public function index()
    {
        $novels = Novel::all();
        return view('novels.index', compact('novels'));
    }

    public function create()
    {
        //
    }

public function show($id)
{
    $novel = Novel::findOrFail($id);
    $user = $novel->user;
    $reviews = Review::where('novel_id', $id)->get();

    return view('novels.show')->with([
    //小説の情報
        'novel_title' => $novel->novel_title,
        'novel_text' => $novel->novel_text,
        'novel_introduction' => $novel->novel_introduction,
        'updated_at' => $novel->updated_at,
        'novel_id' => $novel->id,//追加
    //小説作者の名前
        'name' => $user->name,
    //レビューの情報
         'reviews' => $reviews->map(function ($review) {
                return [
                    'review_text' => $review->review_text,
                    'review_title' => $review->review_title,
                    'reviewer_name' => $review->user->name,
                    'review_created_at' => $review->created_at,
                ];
            }),
        
    ]);
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
}