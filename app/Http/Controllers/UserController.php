<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function show($id)
{
    $user = User::findOrFail($id);
    return view('users.show', compact('user'));

}

public function destroy(Request $request, User $user)
{
    if (Auth::id() !== $user->id) {
        abort(403);
    }

    Auth::logout();
    $user->delete();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}
}