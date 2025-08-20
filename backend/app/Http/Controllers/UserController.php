<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

use App\Enums\RolesEnum;
use App\Mail\SendPasswordMail;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        $roles = RolesEnum::getAllDatas();
        $rolesSelect = RolesEnum::getDatasSelect();
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('users.show', compact('users','roles','rolesSelect'));
    }

    public function upsert(Request $request)
    {
        $validated = $request->validateWithBag('upsertUser', [
            'id' => ['nullable', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
            'role_id' => ['required', 'integer'],
        ]);

        $id = $request->id;
        $isNewUser = false;
        $password = false;
        $user;

        if($id){
            $user = User::find($id);
        }else{
            $user = new User();
            $isNewUser = true;
        }

        if($isNewUser){
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&';
            $password = substr(str_shuffle($characters), 0, 12);
            $user->password = Hash::make($password);
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];
        $user->save();

        if($isNewUser){
            $data = [
                'email' => $user->email,
                'password' => $password,
                'role' => $user->role()->name(),
            ];
            Mail::to($user->email)->send(new SendPasswordMail($user->name, $data));
            Mail::to(Auth::user()->email)->send(new SendPasswordMail(Auth::user()->name, $data, true));
        }
        return Redirect::route('users.show');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return Redirect::route('users.show');        
    }
}

