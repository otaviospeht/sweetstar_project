<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cartao;
use App\Models\Pedido;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $pedidos = Pedido::where('Cod_Cli', Auth::user()->Cod_Cli)->get();

        return view('auth.profile.index', compact(
            'pedidos'
        ));
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $data['CEP'] = preg_replace('/[^0-9]/', '', $data['CEP']);

            if(isset($data['CPF'])) {
                unset($data['password']);
                $data['Data_Nasc'] = implode('-', array_reverse(explode('/', $data['Data_Nasc']))) . "T00:00:00";
                $data['CPF'] = preg_replace('/[^0-9]/', '', $data['CPF']);
                $data['Contato_Tel'] = preg_replace('/[^0-9]/', '', $data['Contato_Tel']);
                $data['Senha'] = Hash::make($data['Senha']);
            }

            $user = Auth::user();
            $user->fill($data);
            $user->save();
        } catch (\Exception $e) {
            return response()->json('Erro ao atualizar dados: ' . $e->getMessage(), 500);
        }

        return response()->json([
            'message' => 'Dados atualizados!'
            ,'user' => $user
        ], 200);
    }

    public function storeCard(Request $request)
    {
        try {
            $data = $request->all();
            $date = explode('/', $data['Data_Val']);
            $data['Data_Val'] = "{$date[1]}-{$date[0]}-01T00:00:00";
            $data['Num_Cartao'] = preg_replace('/[^0-9]/', '', $data['Num_Cartao']);

            $cartao = new Cartao();
            $cartao->fill($data);
            $cartao->save();
        } catch (\Exception $e) {
            return response()->json('Erro ao cadastrar cartão: ' . $e->getMessage(), 500);
        }

        return response()->json([
            'message' => 'Cartão cadastrado com sucesso!',
            'card' => $cartao
        ], 200);
    }
}