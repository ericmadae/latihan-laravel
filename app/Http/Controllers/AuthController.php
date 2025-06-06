<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return back();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
