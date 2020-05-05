<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Laravel\Lumen\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home.index');
    }

    public function search(Request $request)
    {
        return view('home.search');
    }
}