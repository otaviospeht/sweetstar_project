<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 24/03/2020
 * Time: 21:46
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function username()
    {
        return 'Email';
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return response()->json('Logado com sucesso!', 200);
        }

        return response()->json('E-mail ou senha inválidos.', 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }

    public function index()
    {
        return view('auth.login');
    }
}