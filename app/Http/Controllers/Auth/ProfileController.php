<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Laravel\Lumen\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = new User();
        $user->fill([
            'token'         =>       null,
            'nome'          =>      'Otavio Speht',
            'email'         =>      'otaviospeht@hotmail.com',
            'cpf'           =>      '459.008.318-33',
            'data_nasc'     =>      '28/07/1998',
            'cel'           =>      '(11) 9 7097-3739',
            'cep'           =>      '09280-510',
            'rua'           =>      'Rua Araci',
            'numero'        =>      '714',
            'bairro'        =>      'Vila Curuçá',
            'cidade'        =>      'Santo André',
            'estado'        =>      'SP'
        ]);

        return view('auth.profile.index', compact('user'));
    }
}