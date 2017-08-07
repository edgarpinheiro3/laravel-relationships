<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne()
    {

    	//one to one faz desse jeito

    	//retorna apenas um (um pais so tem uma localizacao)
    	
    	//$country = Country::find(1);
    	//caso eu queira fazer uma pesquisa por outro campo
    	$country = Country::where('name', 'Brasil')->get()->first(); //o ->get retorna um array

    	echo $country->name;

    	$location = $country->location;// o location e forma de atributo // de um para um melhor usar como atributo
    	//$location = $country->location()->get()->first();// o location e forma de metodo o bom de utilizar dessa forma e que vc pode fazer filtros com where
    	echo "<hr> Latitude: {$location->latitude} <br/>";
    	echo "Longitude: {$location->longitude} <br/>";
    }

    public function oneToOne2()
    {

        //one to one faz desse jeito

        //retorna apenas um (um pais so tem uma localizacao)
        
        //$country = Country::find(1);
        //caso eu queira fazer uma pesquisa por outro campo
        $country = Country::where('name', 'Brasil')->get()->first(); //o ->get retorna um array

        echo $country->name;

        $location = $country->location;// o location e forma de atributo // de um para um melhor usar como atributo
        //$location = $country->location()->get()->first();// o location e forma de metodo o bom de utilizar dessa forma e que vc pode fazer filtros com where
        echo "<hr> Latitude: {$location->latitude} <br/>";
        echo "Longitude: {$location->longitude} <br/>";
    }    

    public function oneToOneInverse()
    {

    	$latitude = 123;
    	$longitude = 321;

    	$location = Location::where('latitude', $latitude)
    							->where('longitude', $longitude)
    							->get()
    							->first();
    	$country = $location->country->get()->first();//deixei assim para ver que existe dois meios ou atributo como esta no exemplo acima ou metodo como esta neste exemplo
    	echo $country->name;

    }

    public function oneToOneInsert()
    {
    	$dataForm = [
    		'name' => 'Colombia', //tem que existir o pais cadastrado
    		'latitude' => '981',
    		'longitude' => '189',
    	];

    	//$country = Country::create($dataForm);
    	$country = Country::where('name', 'Colombia')->get()->first();//recupera o pais e atualiza a sua localização caso nao exista

    	//$country->id; //se quiser mostrar o cara que foi cadastrado


    	/*$dataForm['country_id'] = $country->id;
    	$location = Location::create($dataForm);*/

    	//ou

    	/*
    	$location = new Location;
    	$location->latitude = $dataForm['latitude'];
    	$location->longitude = $dataForm['longitude'];
    	$location->country_id = $country->id;
    	$saveLocation = $location->save();
    	*/

    	//ou

    	$location = $country->location()->create($dataForm);//chamando o metodo location no Model Country
    	var_dump($location);

    }

}
