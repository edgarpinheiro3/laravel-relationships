<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	//exemplo oneToOneInsert
	protected $fillable = ['latitude','longitude'];

    public function country()
    {
    	//return $this->belongsTo(Country::class, 'country_id', 'id'); 
    	return $this->belongsTo(Country::class);//o exemplo que esta comentado acima faz a mesma coisa que esse porem passo os campo do meu ralacionamento como esta correto o padrao dos campos nao preciso passar, mas se descomentar o exemplo acima também ira funcionar.
    }
}
