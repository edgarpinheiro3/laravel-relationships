<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\State;

class Country extends Model
{
	//exemplo oneToOneInsert
	protected $fillable = ['name'];

	//One to One -> Tras apenas um registro uma dica é o nome do meu metodo location() SINGULAR
    public function location()
    {
    	//return $this->hasOne(Location::class, 'country_id', 'id');
    	return $this->hasOne(Location::class);//o exemplo que esta comentado acima faz a mesma coisa que esse porem passo os campo do meu ralacionamento como esta correto o padrao dos campos nao preciso passar, mas se descomentar o exemplo acima também ira funcionar.
    }

    public function states()
    {
    	return $this->hasMany(State::class);//retorna todos os estados vinculado ao pais
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    } 
}
