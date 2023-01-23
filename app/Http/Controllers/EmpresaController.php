<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anexos;
use App\Models\empresa as Company;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

use App\Http\Requests\StoretestRequest;
use Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.empresa');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.empresa');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        //dd($request->all());
        $obj_empresa = new Company();
 
        $request->validate([
            'cliente'=>'required|exists:empresas,empresa,',
            //'telefone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:15|exists:empresas,telefone,',
           // 'endereco'=>'required',
         /*   // 'email'=>'required|email|exists:empresas,email,',
            'data_contrato'=>'required',
            'descricao'=>'max:50',
            'tipo_empresa'=>'required',
            'url'=>'required',
            'nuit'=>'required|max:14' */
        ]);  
    
       /*  if( $request->hasFile('doc_anexo') ){
           
            $path = "arquivos";
            $file = $request->file('doc_anexo');
            $filename = $file->getClientOriginalName();
            $new_filename = time().'_'.$filename;

            dd('ofdd');
            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

            $anexo_path = $path.'anexos';
            if( !Storage::disk('public')->exists($anexo_path) ){
                Storage::disk('public')->makeDirectory($anexo_path, 0755, true, true);
            }

            // Criar pasta anexos
            Image::make( storage_path('app/public/'.$path.$new_filename) )
                  ->fit(200, 200)
                  ->save( storage_path('app/public/'.$path.'anexos/'.'thumb_'.$new_filename) );


                  if($upload){


                  }

        }else{
            dd('Dados');
        } */
        $obj_empresa->user_id=Auth::id();
        $obj_empresa->empresa=$request->cliente;
        $obj_empresa->telefone=$request->telefone;
        $obj_empresa->email=$request->email;
        $obj_empresa->localizacao=$request->endereco;
        $obj_empresa->data_contrato=$request->data_contrato;
        $obj_empresa->descricao=$request->descricao;
        $obj_empresa->tipo_empresa=$request->tipo_empresa;
        $obj_empresa->url=$request->url;
        $obj_empresa->nuit=$request->nuit;
        //dd($obj_empresa);
        $obj_empresa->save();
       
        $empresa = $obj_empresa->id;

        if($empresa){

            return response()->json(['code' => 1, 'msg' => 'Registro gravado com sucesso!']);
           
            //return view('back.pages.consultas.empresa');

        }else{

            return response()->json(['code' => 0, 'msg' => 'Erro ao tentar gravar registro!']);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
          $data = Company::all();

        //dd($data);
        return view('back.pages.consultas.clientes', compact('data'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        if(!request()->id){

            return abort(404);

        } else {

            $data = Company::find($id);

            /*   $data = [
            'dados' => $facturacao,
            'pageTitle' => 'Editar Dados da facturacao'
            ]; */
            //dd($data);
        return view('back.pages.edit.empresa', compact('data'));

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->id);
        $id = $request->id;

        $obj_empresa = Company::findOrFail($id);

        $request->validate([
            'cliente'=>'required|unique:empresas,empresa,' .$id,
            'telefone'=>'required|min:5|max:9|unique:empresas,telefone',
            'endereco'=>'required|max:30',
            'email'=>'required|email|unique:empresas,email',
            'data_contrato'=>'required|date',
            'descricao'=>'max:50',
            'tipo_empresa'=>'required',
            'url'=>'required',
            'nuit'=>'required|max:14|unique:empresas, nuit,' .$id,

        ],[
            
        ]);  
    
        
        $obj_empresa->user_id=Auth::id();
        $obj_empresa->empresa=$request->cliente;
        $obj_empresa->telefone=$request->telefone;
        $obj_empresa->email=$request->email;
        $obj_empresa->localizacao=$request->endereco;
        $obj_empresa->data_contrato=$request->data_contrato;
        $obj_empresa->descricao=$request->descricao;
        $obj_empresa->tipo_empresa=$request->tipo_empresa;
        $obj_empresa->url=$request->url;
        $obj_empresa->nuit=$request->nuit;
        $obj_empresa->save();
       
        //dd($obj_empresa->id);

        $empresa = $obj_empresa->id;

        if($obj_empresa){

            return response()->json(['code' => 1, 'msg' => 'Registro alterado com sucesso!', 'success']);
           
            //return view('back.pages.consultas.empresa');

        }else{

            return response()->json(['code' => 0, 'msg' => 'Erro ao tentar alterar registro!']);

        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->cliente_id;
        if(!$id) abort(404);

        $data = Company::find($id)->delete();
        //dd($data);
        if($data){
            return response()->json(['code' => 1, 'msg' => 'Registro eliminado com sucesso!', 'success']);


        }else{

        return response()->json(['code' => 0, 'msg' => 'Falha ao tentar eliminar registro!', 'success']);

        }
    }

    
    public function relatorio(Request $request){
        
        return view('back.pages.printers.clientes');

    }

    public function relatorioIndividual(Request $request){
        //dd($id);

        return view('back.pages.printers.rel_cliente_individual');
    }
}
