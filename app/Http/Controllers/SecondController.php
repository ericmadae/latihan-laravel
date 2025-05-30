<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SecondController extends Controller
{
    public function index() {
        if (!Gate::allows('access-admin')) {
            abort(403);
        }   
        return view('pages.second');
    }
}
