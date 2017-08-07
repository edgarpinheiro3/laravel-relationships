<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()//um pais possui varios estado //uma cidade possui varios estados
    {
    	//$country = Country::where('name', 'Brasil')->get()->first();//retorna um resultado

    	$keySearch = 'a';

    	$countries =  Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();//with ja tras o pais viculado aos estados

    	//dd($countries);

    	foreach ($countries as $country) {// aula 07
    		echo "<b>{$country->name}</b>";
    		$states = $country->states; //states em forma de atributo
    		//$states = $country->states()->get(); //states em fora de metodo voce pode usar ->where()
    		//$states = $country->states()->get();

    		foreach ($states as $state) {
    			echo "<br> {$state->initials} - {$state->name}";
    		}

    		echo '<hr>';    		
    		
    	}

    }

    public function manyToOne()
    {
    	$stateName = 'São Paulo';
    	$state = State::where('name', $stateName)->get()->first();

    	echo "<b>{$state->name}</b>";

    	$country = $state->country;
    	echo "<br/>País: {$country->name}";
    }


    public function oneToManyTwo()//um pais possui varios estado //uma cidade possui varios estados
    {
    	//$country = Country::where('name', 'Brasil')->get()->first();//retorna um resultado

    	$keySearch = 'a';

    	$countries =  Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();//with ja tras o pais viculado aos estados

    	//dd($countries);

    	foreach ($countries as $country) {// aula 07
    		echo "<b>{$country->name}</b>";
    		$states = $country->states; //states em forma de atributo
    		//$states = $country->states()->get(); //states em fora de metodo voce pode usar ->where()
    		//$states = $country->states()->get();

    		foreach ($states as $state) {
    			echo "<br> {$state->initials} - {$state->name} -";

    			foreach ($state->cities as $city) {
    				echo " {$city->name}, ";
    			}
    		}

    		echo '<hr>';    		
    		
    	}

    }

    public function oneToManyInsert()
    {
    	$dataForm =[
    		'name' => 'Bahia',
    		'initials' => 'BA',
    	];

    	$country = Country::find(1);

    	$insertState = $country->states()->create($dataForm);

    	var_dump($insertState->name);
    }

    public function oneToManyInsertTwo()
    {
    	$dataForm =[
    		'name' => 'João Pessoa',
    		'initials' => 'PB',
    		'country_id' => '1',
    	];

    	$insertState = State::create($dataForm);

    	var_dump($insertState->name);
    }    

}
