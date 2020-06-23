<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 16/06/2020
 * Time: 21:08
 */

namespace App\Http\Controllers\Carrinho;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
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
            array_keys($request->session()->get('products', []))
        )->map(function($item) use ($request) {
            $item['quantidade'] = $request->session()->get('products')[$item['codProd']];
            $item['subtotal'] = number_format($item['valorUnit'] * $item['quantidade'], 2);

            return $item;
        });

        $subtotal = number_format($products->sum('subtotal'), 2);
        $frete = number_format(12.50, 2);
        $total = number_format($subtotal + $frete, 2);

        return view ('carrinho.index', compact('products', 'subtotal', 'frete', 'total'));
    }

    public function add(Request $request)
    {
        $products = $request->session()->get('products');

        if(!isset($products[$request->get('codProd')])) {
            $products[$request->get('codProd')] = 1;
        } else {
            $products[$request->get('codProd')]++;
        }

        $request->session()->put('products', $products);

        return response()->json('O produto foi adicionado ao carrinho.', 200);
    }

    public function destroy($id, Request $request)
    {
        $products = $request->session()->get('products');

        unset($products[$id]);

        $request->session()->put('products', $products);

        return response()->json('Produto removido do carrinho.', 200);
    }

    public function update($id, Request $request)
    {
        $products = $request->session()->get('products');

        $products[$id] = $request->get('quantidade');

        $request->session()->put('products', $products);

        return response()->json('Quantidade atualizada.', 200);
    }
}