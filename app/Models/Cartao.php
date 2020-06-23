<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 21/06/2020
 * Time: 14:56
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $table = 'dbo.Cartao';

    public $primaryKey = 'ID_Cartao';

    protected $fillable = [
        'Num_Cartao',
        'Data_Val',
        'Nome_Cartao',
        'Cod_Cli'
    ];

    public $timestamps = false;

    protected $attributes = [
        'ID_Pag' => 2
    ];
}