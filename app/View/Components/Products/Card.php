<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 05/06/2020
 * Time: 14:16
 */

namespace App\View\Component\Products;


use Illuminate\View\Component;

class Card extends Component
{
    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('components.products.card');
    }
}