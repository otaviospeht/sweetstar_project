<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 15/06/2020
 * Time: 17:40
 */

namespace App\Http\Controllers\Contato;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        return view('contato.index');
    }

    public function store(Request $request)
    {
        return response()->json('Mensagem recebida.', 200);
    }
}