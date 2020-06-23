<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 21/06/2020
 * Time: 19:33
 */

namespace App\Http\Controllers\Carrinho;


use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Models\Itens;
use App\Models\Pedido;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $products = collect(
            $this->productRepository
                ->getProducts()
        )->whereIn('codProd',
            array_keys($request->session()->get('products'))
        )->map(function($item) use ($request) {
            $item['quantidade'] = $request->session()->get('products')[$item['codProd']];
            $item['subtotal'] = number_format($item['valorUnit'] * $item['quantidade'], 2);

            return $item;
        });

        $subtotal = number_format($products->sum('subtotal'), 2);
        $frete = number_format(12.50, 2);
        $total = number_format($subtotal + $frete, 2);

        return view('carrinho.checkout.index', compact(
            'products'
            ,'frete'
            ,'total'
        ));
    }

    public function download()
    {
        return response()->download(storage_path("app/public/Boleto.pdf"));
    }

    public function store(Request $request)
    {
        $products = collect(
            $this->productRepository
                ->getProducts()
        )->whereIn('codProd',
            array_keys($request->session()->get('products'))
        )->map(function($item) use ($request) {
            $item['quantidade'] = $request->session()->get('products')[$item['codProd']];
            $item['subtotal'] = number_format($item['valorUnit'] * $item['quantidade'], 2);

            return $item;
        });

        $subtotal = number_format($products->sum('subtotal'), 2);
        $frete = number_format(12.50, 2);
        $total = number_format($subtotal + $frete, 2);

        try {
            $pedido = new Pedido();
            $pedido->Cod_Cli = Auth::user()->Cod_Cli;
            $pedido->Valor_Tot = $total;
            $pedido->Data_Ped = date('Y-m-d') . 'T' . date('H:i:s');
            $pedido->Num_Parc = $request->get('parcelas');
            $pedido->ID_Pag = $request->get('payment');
            $pedido->save();

            $itens = [];

            foreach($products as $product) {
                $itens[] = [
                    'Num_Ped' => $pedido->Num_Ped,
                    'Cod_Prod' => $product['codProd'],
                    'Qnt_Vend' => $product['quantidade'],
                    'Valor_Vend' => $product['valorUnit']
                ];
            }

            Itens::insert($itens);

            $request->session()->forget('products');
        } catch (\Exception $e) {
            return response()->json('Erro ao realizar o pedido: ' . $e->getMessage(), 500);
        }

        return response()->json('Pedido realizado!', 200);
    }
}