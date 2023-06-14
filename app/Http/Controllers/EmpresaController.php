<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anexos;
use App\Models\empresa as Company;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;



use Auth;
use phpDocumentor\Reflection\Types\Null_;

class EmpresaController extends Controller
{
 
    public function index()
    {
        return view('back.pages.empresa');
        
    }

   
    public function create()
    {
        return view('back.pages.empresa');
        
    }

 
    public function store(Request $request)
    {
        $obj_empresa = new Company();
        $validator= Validator::make($request->all(),[
          /*   'cliente'=>'required|exists:empresas,empresa,',
            'telefone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:15|exists:empresas,telefone,',
            'endereco'=>'required',
            'email'=>'required|email|exists:empresas,email,',
            'data_contrato'=>'required',
            'largura_banda_contratada'=>'required',
            'descricao'=>'max:50',
            'tipo_empresa'=>'required',
            'url'=>'required',
            'nuit'=>'required|max:14' */
        ],[

        ]);  
    
        if($validator->passes()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
    
            
            $obj_empresa->user_id = Auth::id();
            $obj_empresa->empresa=$request->cliente;
            $obj_empresa->largura_banda_contratada=$request->largura_banda_contratada;
            $obj_empresa->telefone=$request->telefone;
            $obj_empresa->email=$request->email;
            $obj_empresa->localizacao=$request->endereco;
            $obj_empresa->data_contrato=$request->data_contrato;
            $obj_empresa->descricao=$request->descricao;
            $obj_empresa->tipo_empresa=$request->tipo_empresa;
            $obj_empresa->url=$request->url;
            $obj_empresa->nuit=$request->nuit;
        
            $obj_empresa->save();
        
            $empresa = $obj_empresa->id;
            //dd($empresa);
            if($empresa){
                //return back->with('success','Registro gravado com sucesso!');
                return response()->json(['code' => 1, 'msg' => 'Gravado com sucesso!']);
            
                //return view('back.pages.consultas.empresa');

            }else{
                //return back->with('error', 'Erro ao tentar gravar registro!');
                return response()->json(['code' => 0, 'msg' => 'Erro ao tentar gravar registro!']);

            }  
        }

    }

    public function show(Request $request)
    {
          $data = Company::all();

        //dd($data);
        return view('back.pages.consultas.clientes', compact('data'));
   
    }

  
    public function edit(Request $request)
    {
        $id = $request->id;
        if(!request()->id){

            return abort(404);

        } else {

            $data = Company::find($id);

         
        return view('back.pages.edit.empresa', compact('data'));

        }

    }

   
    public function update(Request $request)
    {
        $id = $request->id;

        $obj_empresa = Company::findOrFail($id);

        $validator= Validator::make($request->all(),[
            'cliente'=>'required|unique:empresas,empresa,'.$id,
            'telefone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:5|max:9|unique:empresas,telefone,'.$id,
            'endereco'=>'required|max:30',
            'email'=>'required|email|unique:empresas,email,'.$id,
            'data_contrato'=>'required',
            'largura_banda_contratada'=>'required',
            'descricao'=>'max:50',
            'tipo_empresa'=>'required',
            'url'=>'required',
            'nuit'=>'required|max:14|unique:empresas,nuit,'.$id,  

        ],[
            
        ]);  
        if(!$validator->passes()){

            return redirect()->back()->withInput()->withErrors($validator);
            
        }else{
            //dd($obj_empresa);
            $obj_empresa->user_id=Auth::id();
            $obj_empresa->empresa=$request->cliente;
            $obj_empresa->largura_banda_contratada=$request->largura_banda_contratada;
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

            if($empresa){
                return redirect()->back()->with('success', 'Registro alterado com sucesso!');
               
            }else{
                return redirect()->back()->with('error','Erro ao tentar alterar registro!');
            }

           
        
        }

        
    }

   
    public function destroy(Request $request)
    {
        $id = $request->cliente_id;
        if(!$id) abort(404);

        $data = Company::find($id)->delete();
        
        if($data){
            return response()->json(['code' => 1, 'msg' => 'Registro eliminado com sucesso!', 'success']);


        }else{

        return response()->json(['code' => 0, 'msg' => 'Falha ao tentar eliminar registro!', 'success']);

        }

    }


    public function relatorioTodos(Request $request){
      
        $empresas = DB::table('empresas')
        ->select('*')
        ->where('deleted_at', Null)->get();
        $total_empresas = $empresas->count();
  
        return view('back.pages.printers.empresas', compact('empresas','total_empresas'));

    }

    public function relatorioIndividual(Request $request){
           
        $empresas = DB::table('empresas')
        ->select('*')
        ->where('id','=', $request->id)
        ->where('deleted_at',Null)->get();
        $total_empresas = $empresas->count();
        
     
        return view('back.pages.printers.empresas', compact('empresas','total_empresas'));


    }

    
}
