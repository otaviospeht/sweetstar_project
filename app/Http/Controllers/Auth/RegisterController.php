<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 18/04/2020
 * Time: 13:43
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $user = $request->all();

        unset($user['password']);
        $user['DataNasc'] = implode('-', array_reverse(explode('/', $user['DataNasc']))) . "T00:00:00";
        $user['Cpf'] = preg_replace('/[^0-9]/', '', $user['Cpf']);
        $user['ContatoTel'] = preg_replace('/[^0-9]/', '', $user['ContatoTel']);
        $user['Cep'] = preg_replace('/[^0-9]/', '', $user['Cep']);
        $user['Senha'] = Hash::make($user['Senha']);

        $user = $this->userRepository->store($user);

        return response()->json(compact('user'), 200);
    }
}