<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 25/03/2020
 * Time: 20:16
 */

namespace App\Http\Controllers\Admin\Products;


use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return view('admin.products.index');
    }

    public function all()
    {
        return array('data' =>
            $this->productRepository->getProducts()
        );
    }

    public function create(Request $request)
    {
        $marcas = $this->productRepository->getMarcas();
        $tipos = $this->productRepository->getTipos();
        $categorias = $this->productRepository->getCategorias();
        $fornecedores = $this->productRepository->getFornecedores();

        return view ('admin.products.create.index',
            compact('marcas'
                ,'tipos'
                ,'categorias'
                ,'fornecedores'
            )
        );
    }

    public function store(Request $request)
    {
        $img = $request->file('Img');
        $fn = uniqid() . Carbon::now()->isoFormat('x') . '.' . $img->extension();
        $img->move('img/products/', $fn);

        $product = $request->all();
        $product['DataVali'] = implode('-', array_reverse(explode('/', $product['DataVali']))) . "T00:00:00";
        $product['Img'] = $fn;

        return $this->productRepository->store($product);
    }
}