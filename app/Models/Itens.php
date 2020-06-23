<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 21/06/2020
 * Time: 22:19
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    protected $table = 'dbo.Itens';

    protected $primaryKey = 'ID_Itens';

    public $timestamps = false;

    protected $fillable = [
        'Num_Ped',
        'Cod_Prod',
        'Qnt_Vend',
        'Valor_Vend'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Produto', 'Cod_Prod');
    }
}