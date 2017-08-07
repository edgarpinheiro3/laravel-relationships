<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use Excel;
use Mail;
use Image;
use Session;
use Crypt;
use Hash;

class UtilitiesController extends Controller
{
    public function pdf()
    {

    $arrays = [1,2,3,4,5];

	$pdf = App::make('dompdf.wrapper');
	$pdf->loadHTML(view('utilities.pdf.pdf', compact('arrays')));
	return $pdf->stream();    	

    	//return view('utilities.pdf.pdf');
    }

    public function excel()
    {

		Excel::create('Nome do Meu Arquivo', function($excel) {
		    $excel->sheet('Sheetname', function($sheet) {
		    	$arrays = [1,2,3,4,5,6];
		    	$sheet->loadView('utilities.excel.excel', compact('arrays'));
		    });

		})->export('xls');

    	//opcional a linha abaixo
    	return view('utilities.excel.excel');
    }

    public function mail()
    {
    	Mail::send('utilities.mail.mail', ['teste'=>'123'], function($mail){
    		$mail->from('edgarpinheiro3@gmail.com', 'Edgar Pinheiro');
    		$mail->to('sti@defensoria.pb.gov.br', 'Sti')->subject('Exemplo de Simples Email');

    		$mail->cc('contato@maisonweb.com.br');
    	});
    }

    public function mailAttach()
    {
    	$to = ['email' => 'edgarpinheiro3@gmail.com', 'name'=>'Edgar Pinheiro'];

    	Mail::send('utilities.mail.mail', ['teste'=>'123'], function($mail) use ($to){
    		$mail->from('edgarpinheiro3@gmail.com', 'Edgar Pinheiro');
    		
    		$mail->to($to['email'], $to['name'])
    		->subject('Exemplo Email com Anexo')
    		->bcc('contato@maisonweb.com.br')
    		->attach(storage_path('app/public/imgs/nomedoarquivo.png'));
    	});
    }

    public function upload(){

    	return view('utilities.upload.upload');
    }    

    public function uploadTwo(Request $request){

    	$file = $request->file('file');

    	if ( $request->hasFile('file') && $file->isValid() ) {

    		$rules = [
    			'file' => 'image|mimes:jpg,png,bmp,jpeg|min:100|max:1024',
    		];

    		$validator = \Validator::make($request->all(), $rules);

    		if( $validator->fails() ){
    			return redirect('upload')
    				->withErrors($validator);
    		}

	    	$path = public_path('assets/imgs/uploads');

	    	//Retorna o nome original do meu arquivo e extensão
	    	$nameFile = $file->getClientOriginalName();

	    	$upload = $file->move($path, $nameFile);

	    	if ($upload) {
	    		return 'Sucesso';
	    	}

	    } else {

	    	return redirect('upload')
	    		->withErrors(['errors' => 'Arquivo Inválido']);
	    }

    	return 'Falha';
    }

    public function uploadImage(){

    	return view('utilities.upload.upload-image');
    }    

    public function uploadImageTwo(Request $request){

    	$file = $request->file('file');

    	if ( $request->hasFile('file') && $file->isValid() ) {

    		$rules = [
    			'file' => 'image|mimes:jpg,png,bmp,jpeg|max:1024',
    		];

    		$validator = \Validator::make($request->all(), $rules);

    		if( $validator->fails() ){
    			return redirect('upload-image')
    				->withErrors($validator);
    		}

	    	$path = public_path('assets/imgs/uploads/');

	    	//Retorna o nome original do meu arquivo e extensão
	    	//$nameFile = $file->getClientOriginalName();
	    	$nameFile = date('YmdHms').'.'.$file->getClientOriginalExtension();

	    	$upload = Image::make($file)->resize(100, 100)->save($path.$nameFile);

	    	if ($upload) {
	    		Session::flash('success', 'Upload Realizado com Sucesso!');

	    		return redirect('upload-image');
	    	}

	    } else {

	    	return redirect('upload-image')
	    		->withErrors(['errors' => 'Arquivo Inválido']);
	    }

    }

    public function showImage()
    {
    	return Image::make(public_path('assets/imgs/uploads/Penguins.jpg'))->resize(500,500)->response();
    }


    public function crypt()
    {
    	$val = '123';
    	var_dump($val);

    	echo '<hr/>';

    	$crypt = Crypt::encrypt($val);
    	var_dump( $crypt );

    	echo '<hr/>';

    	var_dump( Crypt::decrypt($crypt) );

    	echo '<hr/>';

    	$hash = Hash::make($val);

    	var_dump( $hash );

    	var_dump( Hash::check($val, $hash) );

    	echo '<hr/>';

    	var_dump( bcrypt($val) );


    }


    public function tinymce()
    {
    	return view('utilities.tinymce.tinymce');
    }

    public function tinymcePost(Request $request)
    {
    	$dadosForm = $request->all();
    	return view('utilities.tinymce.tinymce-post', compact('dadosForm'));
    }    

    public function admincadastrar()
    {
    	return view('utilities.adm.cadastrar');
    }

    public function Goadmincadastrar(Request $request)
    {
    	//dd($request->all());
    	$validator = \Validator::make($request->all(), [
    		'grupo' => 'required',
    		'name.*' => 'required|min:3|max:60',
    		'email.*' => 'required|min:6|max:150|email',
    	]);

    	if( $validator->fails() ){
			return redirect('/adm/cadastrar')
    			->withErrors($validator)
    			->withInput();
    	}

    	return 'Cadastrando...';
    }

}
