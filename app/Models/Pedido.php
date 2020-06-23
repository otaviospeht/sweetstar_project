<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 21/06/2020
 * Time: 22:17
 */

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'dbo.Pedido';

    protected $primaryKey = 'Num_Ped';

    public $timestamps = false;

    protected $attributes = [
        'ID_Status' => 3
    ];

    public function itens()
    {
        return $this->hasMany('App\Models\Itens', 'Num_Ped');
    }
}