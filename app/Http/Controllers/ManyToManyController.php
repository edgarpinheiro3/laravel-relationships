<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
    	$city = City::where('name', 'Guarulhos')->get()->first();

    	echo "<b>{$city->name}</b><br/>";

    	$companies = $city->companies;

    	foreach ($companies as $company) {
    		echo " {$company->name}, ";
    	}
    }

    public function manyToManyInverse()
    {
    	$company = Company::where('name', 'Especializati')->get()->first();   	

    	echo "<b>{$company->name}</b><br/>";

    	$cities = $company->cities;

    	foreach ($cities as $city) {
    		echo " {$city->name}, ";
    	}    	
    }

    public function manyToManyInsert()
    {
    	$dadosForm = [3,4,5];
    	
    	$company = Company::find(1);
    	echo "<b>{$company->name}</b><br/>";

    	$company->cities()->attach($dadosForm);//incrementa
    	//$company->cities()->sync($dadosForm);//remove o que já tinha é insere o que foi passado no $dataForm
    	//$company->cities()->detach([1,2]);//remove o que foi passado

    	$cities = $company->cities;
    	foreach ($cities as $city) {
    		echo " {$city->name}, ";
    	}     	

    }
}
