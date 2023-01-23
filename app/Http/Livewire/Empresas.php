<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\empresa as Company;
use App\Models\anexos;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class Empresas extends Component
{

    use WithPagination;
    public $search;
    public $cliente;
    public $telefone;
    public $endereco;
    public $email;
    public $localizacao;
    public $data_contrato;
    public $descricao;//Descricao da empresa
    public $tipo_empresa;
    // public $Empresa;
    public $Inst_ensino;
    public $url;
    public $nuit;
    public $obj_empresa;
    //public $data_contrato;
    public $doc = [];
    public $desc_doc = [];

    
    public function editEmpresa($empresa){
        //dd('Edit empresa', $empresa['id']);
        $id = $empresa['id'];

        $this->dispatchBrowserEvent('ShowModalEdit_empresa');
        
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

    public function render()
    {
        /* return view('livewire.empresas',[
        'empresas'=>Company::all()
        ]); */
      /*   +"empresa": "Vodacpm"
        +"telefone": "857545445"
        +"email": "vofacom@gmail.com"
        +"localizacao": "Julius Nyerere"
        +"nuit": 4025885
        +"tipo_empresa": "Pr"
        +"url": null
        +"data_contrato": "2022-12-06"
        +"descricao": null
        +"deleted_at": null
        +"created_at": null
        +"updated_at": null
        +"empresa_id": null
        +"user_id": */ 
        $empresas = DB::table('empresas')
            ->join('anexos', 'empresas.id', '=', 'anexos.empresa_id')
            ->select('empresas.id', 'empresas.telefone', 'empresas.email', 'empresas.localizacao', 'empresas.nuit', 
            'empresas.data_contrato', 'empresas.tipo_empresa',
            'anexos.url', 'anexos.empresa_id', 'anexos.descricao')
        ->get(); 

        //dd($empresas);
        return view('livewire.empresas', compact('empresas'));
            
        //dd($empresas);
        /* return view('livewire.empresas',[
           'empresas'=> DB::table('empresas')
                ->join('anexos', 'empresas.id', '=', 'anexos.empresa_id')
                ->select('*')
                ->get()
        ] 
        ); */
    }
 
    
    public function destroy($id){
        dd($id);
    }
public function edit($id){
    dd('Edit empresa', $id);
    //$id = $empresa['id']; */

    $this->dispatchBrowserEvent('ShowModalEdit_empresa');
    
    
}
    
}
