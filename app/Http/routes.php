<?php

Route::get('query-builder', 'QueryBuilderController@tests');
Route::get('query-builder2', 'QueryBuilderController@testsDois');
Route::get('query-builder3', 'QueryBuilderController@testsTres');
Route::get('where', 'QueryBuilderController@where');
Route::get('query-builder4', 'QueryBuilderController@testsQuatro');

//so para testar
Route::get('models', function(){
	$produtos = new App\Models\Produto;

	return $produtos->get();
});

Route::get('test-models', 'TesteModelsController@index');
Route::get('test-models-update/{id}', 'TesteModelsController@update');
Route::get('test-models-delete/{id}', 'TesteModelsController@delete');

Route::group(['middleware' => [], 'web'], function(){
	Route::resource('produto', 'ProdutoController');
});


//One to One
$this->get('one-to-one', 'OneToOneController@oneToOne');//aqui eu tenho o nome do pais ou id ou qualquer campo
$this->get('one-to-one-inverse', 'OneToOneController@oneToOneInverse');//aqui eu tenho a latitude ou longitude do pais
$this->get('one-to-one-insert', 'OneToOneController@oneToOneInsert');//inserindo dados em duas tabelas ou atualiza dados

$this->get('one-to-one2', 'OneToOneController@oneToOne2');

//One to Many
$this->get('one-to-many', 'OneToManyController@oneToMany');//recupera todos os estados de um país
$this->get('many-to-one', 'OneToManyController@manyToOne');
$this->get('one-to-many-two', 'OneToManyController@oneToManyTwo');
$this->get('one-to-many-insert', 'OneToManyController@oneToManyInsert');
$this->get('one-to-many-insert-two', 'OneToManyController@oneToManyInsertTwo');

//Has Many Throught
$this->get('has-many-throught', 'HasManyThroughtController@hasManyThrought');

//Many to Many
$this->get('many-to-many', 'ManyToManyController@manyToMany');
$this->get('many-to-many-inverse', 'ManyToManyController@manyToManyInverse');
$this->get('many-to-many-insert', 'ManyToManyController@manyToManyInsert');


//Relation Polymorphic
$this->get('polymorphics', 'PolymorphicController@polymorphic');
$this->get('polymorphic-insert', 'PolymorphicController@polymorphicInsert');

//JQuery
$this->get('states', 'JqueryController@index');
$this->get('state/{id}', 'JqueryController@cities');
$this->post('cadastrar-city', 'JqueryController@cadastrarCity');
$this->get('editar-city/{id}', 'JqueryController@editarCity');
$this->post('editar-city/{id}', 'JqueryController@editarCityGo');
$this->post('deletar-city/{id}', 'JqueryController@deletarCity');

$this->get('combo', 'JqueryController@combo');
$this->get('cities/{id}', 'JqueryController@comboCities');


$this->get('cadastro-jquery', 'JqueryController@cadastrarJquery');
$this->post('cadastro-jquery', 'JqueryController@cadastrarJqueryAgora');

$this->get('pdf', 'UtilitiesController@pdf');
$this->get('excel', 'UtilitiesController@excel');

$this->get('mail', 'UtilitiesController@mail');
$this->get('mail-attach', 'UtilitiesController@mailAttach');

Route::group(['middleware' => [], 'web'], function(){
	Route::get('upload', 'UtilitiesController@upload');
	Route::post('upload', 'UtilitiesController@uploadTwo');

	Route::get('upload-image', 'UtilitiesController@uploadImage');
	Route::post('upload-image', 'UtilitiesController@uploadImageTwo');

	Route::get('show-image', 'UtilitiesController@showImage');
});

Route::group(['middleware' => [], 'web'], function(){
	Route::get('adm/cadastrar', 'UtilitiesController@admincadastrar');
	Route::post('adm/cadastrar', 'UtilitiesController@Goadmincadastrar');	
});

Route::get('crypt', 'UtilitiesController@crypt');

Route::get('tinymce', 'UtilitiesController@tinymce');
Route::post('tinymce', 'UtilitiesController@tinymcePost');

Route::get('/', function () {
    return view('welcome');
});
