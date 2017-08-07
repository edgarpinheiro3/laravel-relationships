<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
    	$city = City::where('name', 'Guarulhos')->get()->first();
    	echo "Cidade: <b>{$city->name}</b><br/>";

    	$comments = $city->comments()->get();

    	foreach ($comments as $comment) {
    		echo "{$comment->description}<hr/>";
    	}

    	echo "<hr/>";

    	$state = State::where('name', 'Tocantins')->get()->first();
    	echo "Estado: <b>{$state->name}</b><br/>";

    	$comments = $state->comments()->get();

    	foreach ($comments as $comment) {
    		echo "{$comment->description}<hr/>";
    	}

    	echo "<hr/>";

    	$country = Country::find(1);
    	echo "País: <b>{$country->name}</b><br/>";

    	$comments = $country->comments()->get();

    	foreach ($comments as $comment) {
    		echo "{$comment->description}<hr/>";
    	}    	
    }

    public function polymorphicInsert()
    {
    	/*$city = City::where('name', 'Guarulhos')->get()->first();

    	echo "{$city->name}";

    	$comment = $city->comments()->create([
    		'description' => "New comment2 {$city->name}".date('YmdHis'),
    	]);
    	var_dump($comment);*/

    	/*$state = State::where('name', 'Tocantins')->get()->first();

    	echo "{$state->name}";

    	$comment = $state->comments()->create([
    		'description' => "New comment1 {$state->name}".date('YmdHis'),
    	]);
    	var_dump($comment);*/

    	$country = Country::find(1);

    	echo "{$country->name}";

    	$comment = $country->comments()->create([
    		'description' => "New comment1 {$country->name}".date('YmdHis'),
    	]);
    	var_dump($comment);
    }    
}
