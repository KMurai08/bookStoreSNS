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
        'novel_id' => $novel->novel_id,//追加
    //ユーザーの情報
        'name' => $user->name,
    //レビューの情報
        'reviews' => $reviews,
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