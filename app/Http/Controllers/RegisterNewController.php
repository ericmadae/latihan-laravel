<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterNewController extends Controller
{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request) {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        // memasukan data user ke table user
        $newUser = new User();
        $newUser->name = $user['name'];
        $newUser->email = $user['email'];
        $newUser->password = $user['password'];

        $newUser->save();

        return redirect()->route('login.index');


    }
}
