<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Enums\RolesEnum;
class UserController extends Controller
{
    public function show()
    {
        $roles = collect(RolesEnum::cases())->mapWithKeys(function($role) {
            return [$role->value => $role->name()];
        });
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('users.show', compact('users','roles'));
    }

    public function upsert(Request $request)
    {}


    public function destroy(Request $request)
    {}
}

