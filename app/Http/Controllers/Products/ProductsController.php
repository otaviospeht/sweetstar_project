<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Laravel\Lumen\Http\Request;

class ProductsController extends Controller
{
    public function details(Request $request, $id)
    {
        return view('products.details.index');
    }
}