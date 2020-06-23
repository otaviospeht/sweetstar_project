<?php
/**
 * Created by PhpStorm.
 * User: Speht
 * Date: 21/06/2020
 * Time: 11:52
 */

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model implements Authenticatable
{
    protected $table = 'SweetStarControl.dbo.Cliente';

    protected $primaryKey = 'Cod_Cli';

    protected $fillable = [
        'Nome_Comp'
        ,'CPF'
        ,'Data_Nasc'
        ,'Contato_Tel'
        ,'CEP'
        ,'Rua'
        ,'Numero'
        ,'Bairro'
        ,'Cidade'
        ,'UF'
        ,'Email'
        ,'Senha'
    ];

    public $timestamps = false;

    public function cards()
    {
        return $this->hasMany('App\Models\Cartao', 'Cod_Cli');
    }

    protected $rememberTokenName = 'remember_token';

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Senha;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }
}