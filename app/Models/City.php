<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = ['state_id', 'name'];

    public static $rules = [
        'state_id' => 'required',
        'name' => 'required|min:3|max:150',
    ];

	public function companies()
	{
		return $this->belongsToMany(Company::class, 'company_city');//tem que ser nome na ordem alfabetica o nome da tabela como foi criada com nome errado tive que especificar 'company_city'
	}

    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);//retorna todos os estados vinculado ao pais
    }

    public function comments()
    {
    	return $this->morphMany(Comment::class, 'commentable');
    }    
}
