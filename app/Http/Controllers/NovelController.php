<?php

namespace App\Http\Controllers;
use App\Models\Novel;
use App\Models\User;

use Illuminate\Http\Request;

class NovelController extends Controller
{
    public function index()
    {
        $novels = Novel::all();
        return view('novels.index', compact('novels'));
    }
public function show($id)
{
    $novel = Novel::findOrFail($id);
$user = $novel->user;
    return view('novels.show')->with([
        'novel_title' => $novel->novel_title,
        'novel_text' => $novel->novel_text,
        'updated_at' => $novel->updated_at,
        'name' => $user->name
    ]);
}
}