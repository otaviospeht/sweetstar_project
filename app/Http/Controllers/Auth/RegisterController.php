<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 18/04/2020
 * Time: 13:43
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
}