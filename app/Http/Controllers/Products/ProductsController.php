<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductsController extends Controller
{
    private $productRepository;

    private $filters = [
        'idCat',
        'idTipo',
        'idMarca'
    ];

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $products = $this->productRepository->getProducts();
        $marcas = $this->productRepository->getMarcas();
        $tipos = $this->productRepository->getTipos();
        $categorias = $this->productRepository->getCategorias();

        return view('products.index',
            compact('products'
                ,'marcas'
                ,'tipos'
                ,'categorias'
            )
        );
    }

    public function data(Request $request)
    {
        $products = collect($this->productRepository->getProducts());

        $values = $request->all();

        foreach($this->filters as $index) {
            $products = $products->whereIn($index, $values[$index]);
        }

        $view = View::make('products.partials.products', compact('products'))->render();

        return response()->json(compact('view'), 200);
    }

    public function details($id, Request $request)
    {
        $product = $this->productRepository->getProductById($id);

        return view('products.details.index', compact(
            'product'
            )
        );
    }
}