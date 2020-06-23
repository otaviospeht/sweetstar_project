<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 31/05/2020
 * Time: 14:19
 */

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;

class ProductRepository extends BaseRepository
{
    private $url;

    public function __construct()
    {
        $this->url = "{$this->base_url}/produtos";
    }

    public function getMarcas()
    {
        $response = Http::get("{$this->url}/marcas");
        return $response->json();
    }

    public function getTipos()
    {
        $response = Http::get("{$this->url}/tipos");
        return $response->json();
    }

    public function getCategorias()
    {
        $response = Http::get("{$this->url}/categorias");
        return $response->json();
    }

    public function getFornecedores()
    {
        $response = Http::get("{$this->url}/fornecedores");
        return $response->json();
    }

    public function getProducts()
    {
        $response = Http::get("{$this->url}");
        return $response->json();
    }

    public function getProductById($id)
    {
        $response = Http::get("{$this->url}/show/{$id}");
        return $response->json();
    }

    public function store($product)
    {
        $response = Http::asForm()->post("{$this->url}", $product);
        return $response->json();
    }
}