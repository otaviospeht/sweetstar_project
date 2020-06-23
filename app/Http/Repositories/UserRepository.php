<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 18/06/2020
 * Time: 17:52
 */

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;

class UserRepository extends BaseRepository
{
    private $url;

    public function __construct()
    {
        $this->url = "{$this->base_url}/cliente";
    }

    public function store($cliente)
    {
        $response = Http::asForm()->post("{$this->url}", $cliente);
        return $response->json();
    }
}