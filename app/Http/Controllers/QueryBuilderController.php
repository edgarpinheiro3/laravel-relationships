<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class QueryBuilderController extends Controller
{
    public function tests()
    {

    	//SELECT
    	//$cities = DB::table('cities')->get();
    	//dd(DB::table('cities')->get());

    	//INSERT
    	/*
    	$insere = DB::table('produtos')->insert([
    		[
    		'nome' => 'cabide',
    		'cod' => 123,
    		],
			[
    		'nome' => 'escova',
    		'cod' => 456,
    		],   		
    	]);
    	dd($insere);
    	*/

    	//UPDATE
    	/*
    	$update = DB::table('produtos')->where('id', '=', '1')->update([
    		'nome' => 'teste',
    		'cod' => '321'
    	]);
    	dd($update);
    	*/

    	//DELETE
    	/*
    	$delete = DB::table('produtos')->where('id', '1')->delete();
    	dd($delete);
    	*/

    }

    public function testsDois()
    {
    	//evitar e não usar
    	//return DB::select("select * from produtos");

    	//maneira correta
    	//return DB::table('produtos')->get();

    	//return DB::table('produtos')->select('id as codigo','nome')->get();

    	//return DB::table('produtos')->pluck('nome');//tras todos os nomes da tabela produtos

    	//return DB::table('produtos')->first();

    }

    public function testsTres()
    {
    	//return DB::table('produtos')->count();
    	//return DB::table('produtos')->max('cod');
    	//return DB::table('produtos')->min('cod');
    	return DB::table('produtos')->avg('cod');
    }

    public function where()
    {
    	//$produtos = DB::table('produtos')->where([ ['id', '<>', '1'], ['id', '<>', '2'] ])->get();

    	//$produtos = DB::table('produtos')->where('id', '3')->orWhere('id', '<>', '2')->get();

    	//$produtos = DB::table('produtos')->where('nome', 'like', "%cabide%")->get();

    	//$produtos = DB::table('produtos')->whereIn('id', [1,3])->get();

		//$produtos = DB::table('produtos')->whereNotIn('id', [1,3])->get();

		//$produtos = DB::table('produtos')->select('id', 'nome')->whereNull('created_at')->get();

		//$produtos = DB::table('produtos')->select('id', 'nome')->whereNotNull('created_at')->get(); 	

		//$produtos = DB::table('produtos')->select('id', 'nome')->whereBetween('cod', [500, 1000])->get(); 

		$produtos = DB::table('produtos')->select('id', 'nome')->whereNotBetween('cod', [500, 1000])->get(); 	



    	return $produtos;
    }

    public function testsQuatro()
    {
    	//$produtos = DB::table('produtos')->select('id','nome')->orderBy('nome', 'ASC')->get();

    	$produtos = DB::table('produtos')->select('id','nome')->skip(1)->take(4)->get();

    	return $produtos;

    }

}
