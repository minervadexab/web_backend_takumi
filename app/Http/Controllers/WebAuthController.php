<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
}
