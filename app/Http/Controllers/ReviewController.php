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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
