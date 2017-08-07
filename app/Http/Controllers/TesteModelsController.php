<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Produto;

class TesteModelsController extends Controller
{
    public function index()
    {
    	$produto = new \App\Models\Produto;

    	/*dd($produto->insert([
    		'nome' => 'New Prod 2',
    		'cod' => 9849,
    	]));*/

    	//ou

    	/*$produto->nome = 'Insert New Prod';
    	$produto->cod = 1231;
    	dd($produto->save());*/

    	//ou
    	//deve ser utilizado
    	//tenho que informar quais campos tenho que inserir quando uso create se não dar erro de MassAssignmentException
    	dd($produto->create(['nome' => 'New Prod 9', 'cod' => '897']));
    }

    public function update($id)
    {
    	$produto = Produto::find($id);
    	//improdutivo
    	/*$produto->nome = 'Update';
    	$produto->cod = 33242;
    	dd($produto->save());*/

    	dd($produto->update(['nome' => 'Update 2', 'cod' => '4567']));
    }

    public function delete($id)
    {
    	/*
    	$produto = Produto::find($id);// dei o use no produto lá em cima por isso Produto::
    	dd($produto->delete());
    	*/
    	//ou
    	dd(Produto::find($id)->delete());
    }


}
