<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 25/03/2020
 * Time: 20:16
 */

namespace App\Http\Controllers\Admin\Products;


use App\Http\Controllers\Controller;
use Laravel\Lumen\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create(Request $request)
    {
        return view ('admin.products.create.index');
    }
}