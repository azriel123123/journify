<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\User;
use Illuminate\Routing\Controller;

class homeController extends Controller
{
    public function index()
    {

        return view('pages.dashboard');
    }
}
