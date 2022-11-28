<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function create()
    {
        return view('signup');
    }

    public function login()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended('/')->with('msg', "Welcome Back!");
        }

        return back()->with('msg', "Login failed");
    }

    public function signup()
    {
        $validateData = request()->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect()->route('auth.index')->with('succ', "Sign Up Success! Please Login");
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
