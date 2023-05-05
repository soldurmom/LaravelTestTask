<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $credentials = $request -> validate([
            'name'      => ['required', 'string', 'max:24'],
            'age'       => ['required', 'integer'],
            'email'     => ['required', 'email', 'unique:users', 'max:24'],
            'password'  => ['required', 'min:6'],
        ]);

        $user = User::create([
            'name'      => $credentials['name'],
            'age'       => $credentials['age'],
            'email'     => $credentials['email'],
            'password'  => Hash::make($credentials['password']),
        ]);

        Auth::login($user, true);

        return redirect()->route('catalog');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'     => ['required', 'email', 'max:24'],
            'password'  => ['required', 'min:6'],
        ]);
 
        if (!Auth::attempt($credentials,true))
            return back()->withErrors('wrong email or password');
 
        return redirect()->route('catalog');
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
 
        $req->session()->regenerateToken();
		return redirect()->route('login');
    }
}
