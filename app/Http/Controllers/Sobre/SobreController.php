<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 15/06/2020
 * Time: 18:17
 */

namespace App\Http\Controllers\Sobre;


use App\Http\Controllers\Controller;

class SobreController extends Controller
{
    public function index()
    {
        return view('sobre.index');
    }
}