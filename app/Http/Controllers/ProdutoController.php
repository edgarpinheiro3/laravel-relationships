<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Produto;

class ProdutoController extends Controller
{

    protected $request, $produto;

    public function __construct(Request $request, Produto $produto)
    {
        $this->request = $request;
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recupera todos os produtos cadastrados
        //$produtos = Produto::paginate(4);
        $produtos =  $this->produto->paginate(4);
        return view('painel.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.produtos.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store()
    {
        //dd($request->all());

        //dd($request->input('nome')); //pegar um campo especifico

        //dd($request->only(['nome', 'cod'])); //passa os campos que deseja pegar

        //dd($request->except(['cod'])); //pegar os campos exceto

        //return $request->all();

        //a linha a baixo e o mesmo porem estou utilizando Dependency Injection
        //$dadosForm = $request->all();
        $dadosForm = $this->request->all();   

        $validator = \Validator::make($dadosForm, Produto::$rules);

        if( $validator->fails() ){
            return redirect('/produto/create')
                ->withErrors($validator)//verifique as routas caso as mensagem nao apareça tem que esta dentro middlware web
                ->withInput();//deixa preenchido
        }

        //$insert = Produto::create($dadosForm);
        $insert = $this->produto->create($dadosForm);

        //dd($insert->id);//se quiser recuperar o id ou nome cadastrado

        if ( $insert ) {
            return redirect('/produto');
        }

        //dd($insert);


        //return 'Cadastrando os Produtos';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$produto = Produto::find($id);
        $produto = $this->produto->find($id);

        return view('painel.produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //recupera o seu produto pelo id
        //$produto = Produto::find($id);
        $produto = $this->produto->find($id);

        return view('painel.produtos.create-edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$dadosForm = $request->all();
        $dadosForm = $this->request->all();

        //regras para editar
        $rules = [
            'nome' => 'required|min:3|max:150',
            'cod' => "required|numeric|unique:produtos,cod,{$id}",
        ];
        //dd($rules);    

        $validator = \Validator::make($dadosForm, $rules);

        if( $validator->fails() ){
            return redirect("/produto/{$id}/edit")
                ->withErrors($validator)//verifique as routas caso as mensagem nao apareça tem que esta dentro middlware web
                ->withInput();//deixa preenchido
        }

       //$produto = Produto::find($id);
        $produto = $this->produto->find($id);

        //edita o produto
        //$update = $produto->update($request->all());
        $update = $produto->update($this->request->all());

        if ( $update ) {
            return redirect('/produto');
        }

        return redirect("/produto/{$id}/edit")
                    ->withErrors('errors', 'Falha ao Editar');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cria um objeto do produto através de seu id
        //$prod = Produto::find($id);
        $prod = $this->produto->find($id);

        $delete = $prod->delete();

        if ($delete)
            return redirect('/produto');
        else
            return redirect("/produto/$id");
    }
}
