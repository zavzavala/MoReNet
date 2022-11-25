<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Resources\testResource;
use App\Models\empresa as Company;
use App\Http\Requests\StoretestRequest;
class Empresa extends Component
{
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

public function render()
{
    return view('livewire.empresa');
}

public function index(){
    return view('back.pages.empresa');
}

public function create(){
    return view('back.pages.empresa');
}

public function store(){
//dd('sdfdfddfd');
    $obj_empresa = new Company();

    $this->validate([
        'cliente'=>'required',
        'telefone'=>'required|min:5|max:9|unique',
        'endereco'=>'required',
        'email'=>'required|email|unique',
        'localizacao'=>'required|max:30',
        'data_contrato'=>'required|date',
        'descricao'=>'max:50',
        'tipo_empresa'=>'required',
        'url'=>'url',
        'nuit'=>'required|max:14'
    ],[
        
    ]);
    
       /*  if($this->Inst_ensino != '' && $this->tipo_empresa != ''){

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
        $obj_empresa->tipo=$this->Inst_ensino;
        $obj_empresa->url=$this->url;
        $obj_empresa->nuit=$this->nuit;

        $obj_empresa->save();

        $this->showToastr('Registado com sucesso', 'success');

        $this->reset();
        

        
           
    }
 

    public function edit(){


    }

    public function show(){

    }

    public function showToastr($message, $type){

        $this->dispatchBrowserEvent('showToastr',[

        'message'=>$message,
        'type'=>$type
    
    ]);
    }
}
