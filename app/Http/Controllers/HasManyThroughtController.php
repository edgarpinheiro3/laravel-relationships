<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Country;
use App\Models\State;


class HasManyThroughtController extends Controller
{
    public function hasManyThrought()
    {
    	$country = Country::find(1);

    	echo "<b>{$country->name}</b> <br/>";

    	$cities = $country->cities;

    	foreach ($cities as $city) {
    		echo " {$city->name}, ";
    	}

    	echo "<br/> Total de Cidades: {$cities->count()}";
    }
}
