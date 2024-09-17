<?php

namespace App\Http\Controllers;
use App\Models\Bookstore;
use App\Models\User;
use App\Models\Review;

use Illuminate\Http\Request;

class BookstoreController extends Controller
{
    public function index()
    {
        return view('bookstore.index');
    }

    public function create()
    {
        //
    }
}