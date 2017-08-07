<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $fillable = ['nome', 'email'];

    public $rules = [
    	'nome' => 'required|min:3|max:150',
    	'email' => 'required|email|max:150|unique:cadastros',
    ];

}
