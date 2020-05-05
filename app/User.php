<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token',
        'nome',
        'email',
        'cpf',
        'data_nasc',
        'cel',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado'
    ];
}
