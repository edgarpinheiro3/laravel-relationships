<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Cadastro;
use App\Models\State;
use App\Models\City;

class JqueryController extends Controller
{
	private $cadastro, $request, $state, $city;

	public function __construct(Cadastro $cadastro, Request $request, State $state, City $city)
	{
		$this->cadastro = $cadastro;
		$this->request = $request;
		$this->state = $state;
		$this->city = $city;
	}

    public function index()
    {
    	$states = $this->state->get();

    	return view('painel.jquery.index', compact('states'));
	}

	public function cities($idState){

		$state = $this->state->find($idState);

		$cities = $state->cities;

		return view('painel.jquery.cities', compact('state', 'cities'));
	}

	public function cadastrarCity()//retirei Request $request - devido a depencia criada lá em cima
	{
		//$dadosForm = $request->all(); //criado a dependencia faz do jeito abaixo
		$dadosForm = $this->request->all();

		$validator = validator($dadosForm, City::$rules);

		if( $validator->fails() ){
			$messages = $validator->messages();

			$displayErrors = '';

			foreach ($messages->all("<p>:message</p>") as $message) {
				$displayErrors .= $message;
			}

			return $displayErrors;

		}

		//$dadosForm['name'] = "Teste";

		//dd($dadosForm);

		$insert = City::create($dadosForm);

		if ( $insert)
			return '1';
		else
			return 'Fallha ao Cadastrar, erro inesperdado!!!';
	}

	public function editarCity($id)
	{
		$city = $this->city->find($id);

		return response()->json($city);
	}


	public function editarCityGo($id)//retirei Request $request - devido a depencia criada lá em cima
	{
		//$dadosForm = $request->all(); //criado a dependencia faz do jeito abaixo
		$dadosForm = $this->request->all();

		$validator = validator($dadosForm, City::$rules);

		if( $validator->fails() ){
			$messages = $validator->messages();

			$displayErrors = '';

			foreach ($messages->all("<p>:message</p>") as $message) {
				$displayErrors .= $message;
			}

			return $displayErrors;

		}

		$city = $this->city->find($id);

		//$update = City::create($dadosForm); //funciona mas como criei o metodo construtor vou chamar de outro jeito

		$update = $city->update($dadosForm);

		if ( $update)
			return '1';
		else
			return 'Fallha ao Atualizar, erro inesperdado!!!';
	}

	public function deletarCity($id)
	{
		$city = $this->city->find($id);

		if ( $city->delete() )
			return '1';
		else
			return 'Falha ao Deletar a Cidade!';
	}


	public function combo()
	{
		$states = $this->state->get();

		return view('painel.jquery.combo', compact('states'));

	}

	public function comboCities($idState)
	{
		$state = $this->state->find($idState);

		$cities = $state->cities;

		return response()->json($cities);

	}	

	public function cadastrarJquery()
	{
		$titulo =  'Cadastrar Dados Via Ajax';
		return view('painel.jquery.cadastro', compact('titulo'));
	}

	public function cadastrarJqueryAgora()//retirei Request $request - devido a depencia criada lá em cima
	{
		//$dadosForm = $request->all(); //criado a dependencia faz do jeito abaixo
		$dadosForm = $this->request->all();

		$validator = validator($dadosForm, $this->cadastro->rules);

		if( $validator->fails() ){
			$messages = $validator->messages();

			$displayErrors = '';

			foreach ($messages->all("<p>:message</p>") as $message) {
				$displayErrors .= $message;
			}

			return $displayErrors;

		}

		//$insert = Cadastro::create($dadosForm); //criado a dependencia faz do jeito abaixo
		$insert = $this->cadastro->create($dadosForm);

		if ( $insert)
			return '1';
		else
			return 'Fallha ao Cadastrar, erro inesperdado!!!';
	}

}
