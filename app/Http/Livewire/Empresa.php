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
      //dd($request->doc);
        //dd($this->desc_doc, $this->doc);
        $obj_empresa = new Company();

     /*    $this->validate([
            'cliente'=>'required',
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
            
        ]); */
    
        /* if($this->Inst_ensino != '' && $this->tipo_empresa != ''){

            $this->showToastr('Selecione apenas um. Minsiterio ou tipo Empresa', 'warning');

        }else *//* if($this->Inst_ensino == '' && $this->tipo_empresa == ''){

            $this->showToastr('Selecione pelomenos um. Minsiterio ou tipo Empresa', 'warning');

        }else{ */
        
        $obj_empresa->empresa=$this->cliente;
        $obj_empresa->telefone=$this->telefone;
        $obj_empresa->email=$this->email;
        $obj_empresa->localizacao=$this->endereco;
        $obj_empresa->data_contrato=$this->data_contrato;
        $obj_empresa->descricao=$this->descricao;
        $obj_empresa->tipo_empresa=$this->tipo_empresa;
        //$obj_empresa->Empresa=$this->Empresa,
       // $obj_empresa->tipo=$this->Inst_ensino;
        $obj_empresa->url=$this->url;
        $obj_empresa->nuit=$this->nuit;

        $obj_empresa->save();
        //dd($obj_empresa);
        $empresa = $obj_empresa->id;

        if($empresa){
           // $empresa_id = $empresa->id;
           /*  for($i = 0; $i < count($this->doc); $i++){

                $anexo = $this->doc[$i];
                //$documento = substr($anexo, 6, strlen($anexo));
               
                $documento = $anexo->store('anexo');
               $descricao = $this->desc_doc;

                //dd($anexo, $desc_doc);
    
            }  */
            if($this->doc){

                foreach($this->doc as $ficheiro){
                    //$anexo = $this->Documento($ficheiro, $empresa);
                    $documento = $ficheiro->store('anexo');
    
                    //$documento = substr($anexo, 6, strlen($anexo) - 1);
    
                    // $documento = storage_path('app/') .$ficheiro;
    
                    $descricao = $this->desc_doc;
    
    
                 //dd($documento, $descricao);
    
                }

                $obj_anexo = new anexos();
                    
                $obj_anexo->empresa_id = $empresa;
                $obj_anexo->user_id = Auth::id();
                $obj_anexo->url=$documento;
                $obj_anexo->descricao = $descricao;

                $obj_anexo->save();
                //dd($obj_anexo);

                $this->showToastr('Documento carregado com sucesso', 'success');
                //$this->reset();
            }else{

                $this->showToastr('Registado com sucesso', 'success');
                //$this->reset();

            }

           

        }    
            
    }
    

    private function Documento($ficheiro, $empresa){


    }
    public function edit($empresa){
        dd('edit');

    }

    public function show(){

    }

    public function showToastr($message, $type){

        $this->dispatchBrowserEvent('showToastr',[

            'message'=>$message,
            'type'=>$type
    
        ]);
    }

    public function add_linha(){

        $this->dispatchBrowserEvent('add_linha');
    }

}
