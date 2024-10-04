<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }
    
    // 【ReviewController】
    public function store(Request $request, $novel_id)
    {
        $request->validate([
            'review_title' => 'required|max:255',
            'review_text' => 'required|max:65535',
        ]);

        $review = new Review;
        $review->novel_id = $novel_id;
        $review->user_id = Auth::id();
        $review->review_title = $request->review_title;
        $review->review_text = $request->review_text;
        $review->save();

        return redirect()->route('novels.show', $novel_id);
    }
    /**
     * Display the specified resource.
     */
public function show($id)
    {
         $review = Review::with('user','novel')->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        // 認証済みユーザーであり、かつレビューの投稿者であることを確認
        if (Auth::id() !== $review->user_id) {
            return redirect()->route('reviews.show', $review->id)
                ->with('error', '他のユーザーのレビューは編集できません。');
        }
        
        $validatedData = $request->validate([
            'review_title' => 'required|max:255',
            'review_text' => 'required',
        ]);

        $review->update($validatedData);

        return redirect()->route('reviews.show', $review->id)
            ->with('success', 'レビューが更新されました。');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // 認証済みユーザーであり、かつレビューの投稿者であることを確認
        if (Auth::id() !== $review->user_id) {
            return redirect()->route('reviews.show', $review->id)
                ->with('error', '他のユーザーのレビューは削除できません。');
        }

        $novelId = $review->novel_id; // 小説ページにリダイレクトするために保存
        $review->delete();

        return redirect()->route('novels.show', $novelId)
            ->with('success', 'レビューが削除されました。');
    }

    
}
