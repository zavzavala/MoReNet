<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Resources\testResource;
use App\Models\empresa as Company;
use App\Http\Requests\StoretestRequest;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Models\anexos;
use Auth;
class Empresa extends Component
{

    use WithFileUploads;

    public $cliente;
    public $telefone;
    public $endereco;
    public $email;
    public $localizacao;
    public $data_contrato;
    public $descricao;
    public $tipo_empresa;
    // public $Empresa;
    public $Inst_ensino;
    public $url;
    public $nuit;
    public $obj_empresa;
    //public $data_contrato;
    public $doc = [];
    public $desc_doc = [];
    //////////////////FACTURACAO
    public function render()
    {
        /* return view('livewire.empresa',[
            'empresas'=>Company::search(trim($this->search))
                
        ]); */
       
        return view('livewire.empresa');
    }

    public function index(){
        return view('back.pages.empresa');
    }

    public function create(){
        return view('back.pages.empresa');
    }

    public function store(Request $request){
      //dd($request->all());
        //dd($this->desc_doc, $this->doc);
   
        

        /*  $this->validate([
            'cliente'=>'required|unique:empresas,empresa',
            'telefone'=>'required|min:5|max:9|unique:empresas,telefone',
            'endereco'=>'required',
            'email'=>'required|email|unique:empresas,email',
            'localizacao'=>'required|max:30',
            'data_contrato'=>'required|date',
            'descricao'=>'max:50',
            'tipo_empresa'=>'required',
            'url'=>'required',
            'nuit'=>'required|max:14'
        ],[
            
        ]);  */
    
        $obj_empresa = new Company();
        $obj_empresa->user_id=Auth::id();
        $obj_empresa->empresa=$this->cliente;
        $obj_empresa->telefone=$this->telefone;
        $obj_empresa->email=$this->email;
        $obj_empresa->localizacao=$this->endereco;
        $obj_empresa->data_contrato=$this->data_contrato;
        $obj_empresa->descricao=$this->descricao;
        $obj_empresa->tipo_empresa=$this->tipo_empresa;
        $obj_empresa->url=$this->url;
        $obj_empresa->nuit=$this->nuit;
        //dd($obj_empresa);
        $obj_empresa->save();
       
        $empresa = $obj_empresa->id;

        if($empresa){

            $this->showToastr('Registado com sucesso', 'success');

        }

           

          
            
    }
    


    public function edit(Request $request){
    
       //dd('Edit empresa', $empresa);
      // $id = $id['id'];
        $id = $request->id;
        //dd($id);
       $this->dispatchBrowserEvent('ShowModalEdit_empresa');
       $empresa = Company::find($id);
       $empresa->user_id=Auth::id();
       $this->cliente=$empresa['empresa'];
       $this->telefone = $empresa['telefone'];
       $this->email = $empresa['email'];
       $this->endereco=$empresa['localizacao'];
       $this->data_contrato = $empresa['data_contrato'];
       $this->descricao=$empresa['descricao'];
       $this->tipo_empresa = $empresa['tipo_empresa'];
       $this->url=$empresa['url']; //endereco electronico
       $this->nuit = $empresa['nuit'];
      // $this->doc=$empresa['url'];
      // $this->desc_doc = $empresa['desc_doc'];

    }
   
    public function show(){
        $data = Company::all();

        //dd($data);
        return view('back.pages.consultas.clientes', compact('data'));
   
    }

    public function destroy(Request $request){

      
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
    public function showToastr($message, $type){

        $this->dispatchBrowserEvent('showToastr',[

            'message'=>$message,
            'type'=>$type
    
        ]);
    }

   

}
