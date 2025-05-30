<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginNewController extends Controller
{
    public function index()  {
        return view('login.index');
    }

    public function store(Request $request) {
        $credential = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($credential)) {

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            "email" => "Credential Failed"
        ])->onlyInput('email');
    }
}
