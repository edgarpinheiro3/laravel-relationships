<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public function cities()
	{
		return $this->belongsToMany(City::class, 'company_city');//tem que ser nome na ordem alfabetica o nome da tabela como foi criada com nome errado tive que especificar 'company_city'
	}
}
