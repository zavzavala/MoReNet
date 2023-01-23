<?php

namespace App\Http\Livewire;

use App\Models\empresa;
use Livewire\Component;
use App\Models\facturacao;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FacturacaoController extends Component
{

    public $cliente, $banda, $aumento_banda, $preco_unitario, $ano, $mes, $n_factura, $valor_facturado,
    $debito, $valor_pago, $divida, $credito, $data_pagamento, $numero_doc;
    public function render()
    {
        return view('livewire.facturacao-controller');
    }



        public function index(){

        return view('back.pages.empresa');

        }
    public function store(){
        //dd('FActura');
        /* 
            preco_unitario
            valor_facturado
            valor_pago
            debito
            credito
            divida
        */
        
        //$v_facturado = $this->valor_pago - $this->credito;

        //$divida = $this->valor_facturado + $this->debito - $this->credito - $this->valor_pago;

        //$divida = ++$divid;
        //dd($divid);

        //dd('Facturado',$this->valor_facturado, 'divida:',$divida);
      
        $objCdastra = new facturacao();
       /*  $this->validate([
            'cliente' => 'required',
            'banda' => 'required',
            'aumento_banda' => 'required',
            'preco_unitario' => 'required',
            'ano' => 'required',
            'mes' => 'required',
            'n_factura' => 'required',
            'valor_facturado' => 'required',
            'valor_pago' => 'required',
            'debito' => 'required',
            //'divida' => 'required',
            'credito' => 'required',
            'data_pagamento' => 'required',
            'numero_doc' => 'required',

        ],
        [
            'cliente.required' => 'Selecione uma instituicao',
            'banda.required' => 'Este campo é obrigatòrio',

            'aumento_banda.required' => 'Este campo é obrigatòrio',

            'preco_unitario.required' => 'Este campo é obrigatòrio',

            'ano.required' => 'Este campo é obrigatòrio',
            'mes.required' => 'Este campo é obrigatòrio',
            'n_factura.required' => 'Este campo é obrigatòrio',
            'valor_facturado.required' => 'Este campo é obrigatòrio',

            'valor_pago.required' => 'Este campo é obrigatòrio',

            'debito.required' => 'Este campo é obrigatòrio',

            'divida.required' => 'Este campo é obrigatòrio',

            'credito.required' => 'Este campo é obrigatòrio',
            'data_pagamento.required' => 'Este campo é obrigatòrio',

            'numero_doc.required' => 'Este campo é obrigatòrio',
            

        ]); */


        $objCdastra->empresa_id=$this->cliente;
        $objCdastra->user_id=Auth::id();
        $objCdastra->largura_banda=$this->banda;
        $objCdastra->aumento_banda=$this->aumento_banda;
        $objCdastra->preco_unitario=$this->preco_unitario;
        $objCdastra->ano=$this->ano;
        $objCdastra->mes=$this->mes;
        $objCdastra->n_factura=$this->n_factura;
        $objCdastra->valor_facturado=$this->valor_facturado;
        $objCdastra->debito=$this->debito;
        $objCdastra->valor_pago=$this->valor_pago;
        $objCdastra->divida_saldo=$this->divida;
        $objCdastra->credito=$this->credito;
        $objCdastra->data_pagamento=$this->data_pagamento;
        $objCdastra->n_documento=$this->numero_doc;

        $objCdastra->save();
        dd($objCdastra);
        if($objCdastra){

            $this->showToastr( 'Registro salvo com sucesso!', 'success');

        }else{

            $this->showToastr( 'Erro ao tentar salvar registro!', 'error');

        }


    }

    public function showToastr($message, $type){

        $this->dispatchBrowserEvent('showToastr',[

            'message'=>$message,
            'type'=>$type
    
        ]);
    }


    public function show(){

        $facturacao = facturacao::all();
        //dd($facturacao);
        return view('back.pages.consultas.facturacao',compact('facturacao'));

    }

    public function edit(Request $request){
        //dd($request->id);
        $id = $request->id;
        if(!request()->id){

            return abort(404);

        }else{

            $data = facturacao::find($id);

          /*   $data = [
            'dados' => $facturacao,
            'pageTitle' => 'Editar Dados da facturacao'
            ]; */
            //dd($data);

            return view('back.pages.edit.facturacao', compact('data'));
        }

    }

    public function update(Request $request){
        //dd($request->all());
       

        $request->validate([
            'cliente' => 'required',
            'largura_banda' => 'required',
            'aumento_banda' => 'required',
            'preco_unitario' => 'required',
            'ano' => 'required',
            'mes' => 'required',
            'n_factura' => 'required',
            'valor_facturado' => 'required',
            'valor_pago' => 'required',
            'debito' => 'required',
            'divida' => 'required',
            'credito' => 'required',
            'data_pagamento' => 'required',
            'numero_doc' => 'required',

        ],
        [
            'cliente.required' => 'Selecione uma instituicao',
            'largura_banda.required' => 'Este campo é obrigatòrio',

            'aumento_banda.required' => 'Este campo é obrigatòrio',

            'preco_unitario.required' => 'Este campo é obrigatòrio',

            'ano.required' => 'Este campo é obrigatòrio',
            'mes.required' => 'Este campo é obrigatòrio',
            'n_factura.required' => 'Este campo é obrigatòrio',
            'valor_facturado.required' => 'Este campo é obrigatòrio',

            'valor_pago.required' => 'Este campo é obrigatòrio',

            'debito.required' => 'Este campo é obrigatòrio',

            'divida.required' => 'Este campo é obrigatòrio',

            'credito.required' => 'Este campo é obrigatòrio',
            'data_pagamento.required' => 'Este campo é obrigatòrio',

            'numero_doc.required' => 'Este campo é obrigatòrio',
            

        ] ); 

        $objUpdate = facturacao::findOrFail($request->id);
        //dd($objUpdate);
        
        $objUpdate->empresa_id=$request->cliente;
        $objUpdate->user_id=Auth::id();
        $objUpdate->largura_banda=$request->largura_banda;
        $objUpdate->aumento_banda=$request->aumento_banda;
        $objUpdate->preco_unitario=$request->preco_unitario;
        $objUpdate->ano=$request->ano;
        $objUpdate->mes=$request->mes;
        $objUpdate->n_factura=$request->n_factura;
        $objUpdate->valor_facturado=$request->valor_facturado;
        $objUpdate->debito=$request->debito;
        $objUpdate->valor_pago=$request->valor_pago;
        $objUpdate->divida_saldo=$request->divida;
        $objUpdate->credito=$request->credito;
        $objUpdate->data_pagamento=$request->data_pagamento;
        $objUpdate->n_documento=$request->numero_doc;

       
        $save = $objUpdate->save();

        if($save){

            return response()->json(['code' => 1, 'msg' => 'Registro alterado com sucesso!', 'success']);

            return redirect()->route('facturacao.show');
            //return view('back.pages.consultas.facturacao');
           

        }else{

            return response()->json(['code' => 0, 'msg' => 'Erro ao tentar alterar registro!']);

        }
    }

    public function destroy(Request $request){

        $id = $request->factura_id;
        //dd($id);
        $data = facturacao::find($id)->delete();

        if($data){

            return response()->json(['code' => 1, 'msg' => 'Registro eliminado com sucesso!', 'success']);
           
            return view('back.pages.consultas.facturacao');

        }else{

            return response()->json(['code' => 0, 'msg' => 'Erro ao tentar eliminar registro!']);

        }

    }

    public function relatorio(Request $request){

        //$data = facturacao::all();
        $data = DB::table('empresas')
            ->join('facturacaos', 'empresas.id', '=', 'facturacaos.empresa_id')
            ->select('empresas.*', 'facturacaos.*', 'facturacaos.debito')
            ->get();
        //dd($data);

        return view('back.pages.printers.facturacao',compact('data'));
   
    }


    public function relIndividual(Request $request){

        $id = $request->id;
        $data = DB::table('empresas')
        ->where('facturacaos.id', $id)
        ->join('facturacaos', 'empresas.id', '=', 'facturacaos.empresa_id')
        ->select('empresas.*', 'facturacaos.*')
        ->get();
        //$data = facturacao::find($id);

        //dd($data);

        return view('back.pages.printers.facturaIndividual',  compact('data'));

    }

    public function somas(){

        /* $data = \DB::table('SELECT facturacaos.empresa_id as cod_empresa, empresa as nome empresa FROM facturacaos

        inner join empresas on facturacaos.empresa_id = empresas.id');
 */
             $data = DB::table('empresas')
              
            ->join('facturacaos', 'empresas.id', '=', 'facturacaos.empresa_id') 
            //->sum('facturacaos.valor_facturado')
            ->select('empresas.empresa', 'facturacaos.empresa_id')->get();

          
    /*  
       $data = facturacao::select("facturacaos.credito")
        // ->where('empresas.id', '=', 'facturacaos.empresa_id')
         ->join('empresas', 'empresas.id', '=', 'facturacaos.empresa_id')
         ->sum('facturacaos.valor_facturado'); */

        dd($data);

       /*  $data = facturacao::where([
           
            'user_id' => Auth::id()
        ])->get(); */
    

    }


    public function somaCampos(){
        
        $produtos = DB::table('produtos')->select('quantidade', 'preco')->get();

        $total_produtos = $produtos->sum('quantidade');

        $total_preco = $produtos->sum('preco');

        //return view('minha_view', compact('total_produtos', 'total_preco');

    }

}
