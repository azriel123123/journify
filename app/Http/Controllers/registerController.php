<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function create()
    {
        return view('pages.auth.register');
    }
}
