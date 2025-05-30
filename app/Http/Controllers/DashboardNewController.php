<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardNewController extends Controller
{
    public function index()  {
        return view('dashboard-new.index');
    }
}
