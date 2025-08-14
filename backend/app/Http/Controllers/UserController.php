<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('users.show', compact('users'));
    }

    public function upsert(Request $request)
    {}


    public function destroy(Request $request)
    {}
}

