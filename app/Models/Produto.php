<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //protected $table = 'produtos'; //se a tabela for diferente da model
    //protected $primaryKey = 'id_produto'; //se o no do atributos seja diferente do id
    //protected $timestamps = false; //não que os campos não seja preechidos
    //protected $connection = 'mysql2'; //se você quiser que esses dados seja cadastrados em outro banco

	//quais sao os campos que poderam se inseridos
    protected $fillable = [
    'nome',
    'cod',
    ];
    
    //os que não podem ser preenchidos
    /*protected $quarded = [
    	'tipo',
        ];*/

    static $rules = [
        'nome' => 'required|min:3|max:150',
        'cod' => 'required|numeric|unique:produtos',
    ];


      
    }
