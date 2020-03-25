<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 24/03/2020
 * Time: 21:46
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
}