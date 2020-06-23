<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use Laravel\Lumen\Http\Request;

class HomeController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $products = collect($this->productRepository->getProducts())->take(6)->toArray();

        return view('home.index', compact('products'));
    }

    public function search(Request $request)
    {
        return view('home.search');
    }
}