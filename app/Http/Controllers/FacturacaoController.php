<?php

namespace App\Http\Controllers;
use App\Models\facturacao;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class FacturacaoController extends Controller
{
  
    public function index()
    {
        
        return view('back.pages.empresa');
    }

    
    public function create()
    {

        $data = DB::table('empresas')
            ->whereNull('deleted_at')->get();
                //dd($data);
        return view('back.pages.facturacao', compact('data'));

    }

   
    public function Buscar_Largura_Banda(Request $request){

        $l_banda = $request->input('valor_selecionado');

        // Aqui Recupera-se os dados do banco de dados com base no valor selecionado
        $dados = empresa::where('id', $l_banda)->get();
         
        return response()->json($dados);

    }
    public function store(Request $request)
    {
      
        $objCdastra = new facturacao();

        $validator = Validator::make($request->all(),[
            'cliente' => 'required',
            'largura_banda_contratada' => 'required',
            'preco_unitario' => 'required',
            'banda_facturada' => 'required',
            'valor_facturado' => 'required',
            //'aumento_banda' => 'required',
            //'diminuicao_banda' => 'required',
            'comprovativo' => 'required',
            'data_facturacao' => 'required',
            'valor_pago' => 'required',
            //'credito' => 'required',
            //'debito' => 'required',     
 
        ],
        [
            'cliente.required' => 'Selecione uma instituicao',

            'largura_banda_contratada.required' => 'Este campo é obrigatòrio',

            'preco_unitario.required' => 'Este campo é obrigatòrio',

            'banda_facturada.required' => 'Este campo é obrigatòrio',
            'valor_pago.required' => 'Este campo é obrigatòrio',
            'valor_facturado.required' => 'Este campo é obrigatòrio',

            'diminuicao_banda.required' => 'Este campo é obrigatòrio',

            'data_facturacao.required' => 'Este campo é obrigatòrio',

            'comprovativo.required' => 'Este campo é obrigatòrio',
            
        ]); 

        if(!$validator->passes()){

            return redirect()->back()->withInput()->withErrors($validator);
            
        }else{

            if($request->largura_banda_contratada < $request->diminuicao_banda){

                return back()->with('warning','Erro. A Banda Facturada não pode ser menor que a diminuição da Banda!');
                //return response()->json(['code'=>0, 'msg'=>'Erro. A Banda Facturada não pode ser menor que a diminuição da Banda!']);
           
            }else{

                
                $objCdastra->empresa_id=$request->cliente;
                $objCdastra->user_id=Auth::id();
                $objCdastra->largura_banda_contratada=$request->largura_banda_contratada;
                $objCdastra->aumento_banda=$request->aumento_banda;
                $objCdastra->preco_unitario=$request->preco_unitario;
                $objCdastra->banda_facturada=$request->banda_facturada;
                $objCdastra->valor_facturado=$request->valor_facturado;
                $objCdastra->data_aumento_banda=$request->data_aumento_banda;
                $objCdastra->data_diminuicao_banda=$request->data_diminuicao_banda;
                $objCdastra->diminuicao_banda=$request->diminuicao_banda;
                $objCdastra->comprovativo=$request->comprovativo;
                $objCdastra->data_facturacao=$request->data_facturacao;
                $objCdastra->valor_pago=$request->valor_pago;
                $objCdastra->credito=$request->credito;
                $objCdastra->debito=$request->debito;
                $objCdastra->divida=$request->divida;

                $objCdastra->save();
                //dd($objCdastra);
                if($objCdastra){

                    //return response()->json(['code'=>1, 'msg'=>'Registro salvo com sucesso!']);
                    return back()->with('success', 'Facturado com sucesso!');

                }else{

                    return back()->with('error', 'Erro ao tentar Facturar empresa!');

                }
            }
        }
    }

    public function show()
    {
        $facturacao = facturacao::all();
        $facturacao= DB::table('facturacaos')
        ->join('empresas','empresas.id', 'facturacaos.empresa_id')
        ->select('empresa','facturacaos.id', 'facturacaos.largura_banda_contratada',
        'facturacaos.aumento_banda',
        'facturacaos.preco_unitario',
        'facturacaos.banda_facturada',
        'facturacaos.valor_facturado',
        'facturacaos.data_aumento_banda',
        'facturacaos.diminuicao_banda',
        'facturacaos.data_diminuicao_banda',
        'facturacaos.comprovativo',
        'facturacaos.data_facturacao',
        'facturacaos.valor_pago',
        'facturacaos.credito',
        'facturacaos.debito',
        'facturacaos.divida')
        ->where('facturacaos.deleted_at', "=", null)->get();
        //dd($facturacao);
        return view('back.pages.consultas.facturacao',compact('facturacao'));

    }

    public function edit(Request $request)
    {
      
        $id = $request->id;
        if(!request()->id){

         return abort(404);

        }else{

            $data = facturacao::find($id);

        

            return view('back.pages.edit.facturacao', compact('data'));
        }
        
    }

  
    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'cliente' => 'required',
            'largura_banda_contratada' => 'required',
            'preco_unitario' => 'required',
            'banda_facturada' => 'required',
            'valor_facturado' => 'required',
            'aumento_banda' => 'required',
            'diminuicao_banda' => 'required',
            'comprovativo' => 'required',
            'data_facturacao' => 'required',
            'valor_pago' => 'required',
            'credito' => 'required',
            'debito' => 'required',        

        ],
        [
            'cliente.required' => 'Selecione uma instituicao',
            'largura_banda_contratada.required' => 'Este campo é obrigatório',

            'aumento_banda.required' => 'Este campo é obrigatório',

            'preco_unitario.required' => 'Este campo é obrigatório',

            'banda_facturada.required' => 'Este campo é obrigatório',
            'valor_pago.required' => 'Este campo é obrigatòrio',
            'valor_facturado.required' => 'Este campo é obrigatório',

            'diminuicao_banda.required' => 'Este campo é obrigatório',

            'debito.required' => 'Este campo é obrigatório',

            'divida.required' => 'Este campo é obrigatório',

            'credito.required' => 'Este campo é obrigatório',
            'data_facturacao.required' => 'Este campo é obrigatório',

            'comprovativo.required' => 'Este campo é obrigatório',
            
        ]); 

        if(!$validator->passes()){

            return redirect()->back()->withInput()->withErrors($validator);
            
        }else{

            if($request->largura_banda_contratada < $request->diminuicao_banda){
                return back()->with('warning','Erro. A Banda Facturada não pode ser menor que a diminuição da Banda!');
                //return response()->json(['code'=>0, 'msg'=>'Erro. A Banda Facturada não pode ser menor que a diminuição da Banda!']);
            }else{

                $objUpdate = facturacao::findOrFail($request->id);
                
                $objUpdate->empresa_id=$request->cliente;
                $objUpdate->user_id=Auth::id();
                $objUpdate->largura_banda_contratada=$request->largura_banda_contratada;
                $objUpdate->aumento_banda=$request->aumento_banda;
                $objUpdate->preco_unitario=$request->preco_unitario;
                $objUpdate->banda_facturada=$request->banda_facturada;
                $objUpdate->valor_facturado=$request->valor_facturado;
                $objUpdate->data_aumento_banda=$request->data_aumento_banda;
                $objUpdate->data_diminuicao_banda=$request->data_diminuicao_banda;
                $objUpdate->diminuicao_banda=$request->diminuicao_banda;
                $objUpdate->comprovativo=$request->comprovativo;
                $objUpdate->data_facturacao=$request->data_facturacao;
                $objUpdate->valor_pago=$request->valor_pago;
                $objUpdate->credito=$request->credito;
                $objUpdate->debito=$request->debito;
                $objUpdate->divida=$request->divida;

                $objUpdate->save();
                
                if($objUpdate){

                    //return response()->json(['code'=>1, 'msg'=>'Registro salvo com sucesso!']);
                    return back()->with('success', 'Registro alterado com sucesso!');

                }else{

                    return back()->with('error', 'Erro ao tentar alterar registro!');

                }
            }
        }
   
        
    }

   
    public function destroy(Request $request)
    {
        $id = $request->factura_id;
    
        $data = facturacao::find($id)->delete();

        if($data){

            return response()->json(['code' => 1, 'msg' => 'Registro eliminado com sucesso!', 'success']);
           
   

        }else{

            return response()->json(['code' => 0, 'msg' => 'Erro ao tentar eliminar registro!']);

        }

    }
    
    public function pesquisas(Request $request){
        
        return view('back.pages.printers.pesquisas.facturacao');


    }
    public function buscarDadosFacturacao(Request $request){
       //dd('dfghjkl;');
        if($request->tipo != ''){
            
            $empresas = DB::table('empresas')
            ->where('tipo_empresa', $request->tipo)->get();
            $total_empresas = $empresas->count();
            //dd($tipo, $total_empresas);
        }elseif($request->search){
            $empresas = DB::table('empresas')
                ->select('*')
                ->where('empresa', 'like', '%'.$request->search.'%')
                ->Orwhere('tipo_empresa', 'Like', '%'.$request->search.'%')->get();

            $total_empresas = $empresas->count();

        }
        elseif($request->empresa == 'todas'){
            //dd('Todas');
            $empresas = DB::table('empresas')
            ->select('*')->get();
            $total_empresas = $empresas->count();
            //dd($empresas, $total_empresas);
        }else{
            $empresas = DB::table('empresas')
            ->select('*')
            ->where('id', '=', $request->empresa)->get();
            $total_empresas = $empresas->count();

        }
        $total_valor_facturado = '';
        //dd($_SERVER['DOCUMENT_ROOT'].'\back\static\logo.png');

        //dd($empresas,$total_valor_facturado);
     
        return view('back.pages.printers.facturacao', compact('empresas','total_empresas','total_valor_facturado'));

    }
    public function buscarDados(Request $request){
   
        $empresas = DB::table('empresas')
        ->select('*')
        ->where('id', '=', $request->empresa)->get();
        $total_empresas = $empresas->count();
        if($request->AndOr == 'AND'){
            
            //Pesquisa somente dados da empresa
            $date = \Carbon\Carbon::today()->subDays($request->semestre);
            $data = DB::table('empresas')
            ->join('facturacaos', 'empresas.id', '=', 'facturacaos.empresa_id')
            ->select('empresas.empresa', 'facturacaos.comprovativo', 'facturacaos.debito', 
            'facturacaos.credito', 'facturacaos.divida', 'facturacaos.largura_banda_contratada as total_contratada', 
            'facturacaos.banda_facturada', 'facturacaos.valor_pago as Valor_pago', 'facturacaos.valor_facturado as valor_facturado', 'facturacaos.aumento_banda as aumento', 
            'facturacaos.diminuicao_banda as total_diminuicao')
                ->where('empresas.id', '=', $request->empresa)
                ->where('facturacaos.data_facturacao','>=', $date)
                //->sum('valor_facturado')
            ->groupBy('empresas.empresa', 'facturacaos.comprovativo', 'facturacaos.debito', 
            'facturacaos.credito', 'facturacaos.divida', 'total_contratada', 
            'facturacaos.banda_facturada', 'Valor_pago', 'valor_facturado', 'aumento', 
            'total_diminuicao')->get();
            //dd($data);

        }else{
            
            //Pesquisa dados de todas empresas
            $date = \Carbon\Carbon::today()->subDays($request->semestre);
            $data = DB::table('empresas')
            ->join('facturacaos', 'empresas.id', '=', 'facturacaos.empresa_id')
            ->select('empresas.empresa', 'facturacaos.comprovativo', 'facturacaos.debito', 
            'facturacaos.credito', 'facturacaos.divida', 'facturacaos.largura_banda_contratada as total_contratada', 
            'facturacaos.banda_facturada', 'facturacaos.valor_pago as Valor_pago', 'facturacaos.valor_facturado as valor_facturado', 'facturacaos.aumento_banda as aumento', 
            'facturacaos.diminuicao_banda as total_diminuicao')
                ->where('empresas.id', '=', $request->empresa)
                ->Orwhere('facturacaos.data_facturacao', '>=', $date)
                //->sum('valor_facturado')
                ->groupBy('empresas.empresa', 'facturacaos.comprovativo', 'facturacaos.debito', 
            'facturacaos.credito', 'facturacaos.divida', 'total_contratada', 
            'facturacaos.banda_facturada', 'Valor_pago', 'valor_facturado', 'aumento', 
            'total_diminuicao')->get();

            //dd($data);

        }
       
        $total_valor_facturado = $data->sum('valor_facturado');
        $total_divida = $data->sum('divida');
        $total_debido = $data->sum('debido');
        $total_credito = $data->sum('credito');

    
        return view('back.pages.printers.facturacao', compact('data','total_empresas','empresas','total_valor_facturado','total_divida','total_debido','total_credito'));

    }
    public function empresas(){
        
        return view('back.pages.printers.pesquisas.empresas');

    }
    public function relatorioTodos(Request $request){
       
        $data = DB::table('empresas')
        ->join('facturacaos', 'empresas.id', '=', 'facturacaos.empresa_id')
        ->select('empresas.empresa', 'facturacaos.comprovativo', 'facturacaos.debito', 
        'facturacaos.credito', 'facturacaos.divida', 'facturacaos.largura_banda_contratada as total_contratada', 
        'facturacaos.banda_facturada', 'facturacaos.valor_pago as Valor_pago', 'facturacaos.valor_facturado as valor_facturado', 'facturacaos.aumento_banda as aumento', 
        'facturacaos.diminuicao_banda as total_diminuicao')
            ->where('facturacaos.deleted_at', '=', null)
            //->sum('valor_facturado')
            ->groupBy('empresas.empresa', 'facturacaos.comprovativo', 'facturacaos.debito', 
        'facturacaos.credito', 'facturacaos.divida', 'total_contratada', 
        'facturacaos.banda_facturada', 'Valor_pago', 'valor_facturado', 'aumento', 
        'total_diminuicao')->get();

        

        $total_valor_facturado = $data->sum('valor_facturado');
        $total_divida = $data->sum('divida');
        $total_debido = $data->sum('debido');
        $total_credito = $data->sum('credito');
            
        return view('back.pages.printers.facturacao', compact('data','total_valor_facturado','total_divida','total_debido','total_credito'));

   
    }

    public function relIndividual(Request $request){
        
        $data = DB::table('empresas')
        ->join('facturacaos', 'empresas.id', '=', 'facturacaos.empresa_id')
        ->select('empresas.empresa', 'facturacaos.comprovativo', 'facturacaos.debito', 
        'facturacaos.credito', 'facturacaos.divida', 'facturacaos.largura_banda_contratada as total_contratada', 
        'facturacaos.banda_facturada', 'facturacaos.valor_pago as Valor_pago', 'facturacaos.valor_facturado as valor_facturado', 'facturacaos.aumento_banda as aumento', 
        'facturacaos.diminuicao_banda as total_diminuicao')
            ->where('facturacaos.id', '=', $request->id)
            //->Orwhere('facturacaos.deleted_at', '=',null)
            //->sum('valor_facturado')
            ->groupBy('empresas.empresa', 'facturacaos.comprovativo', 'facturacaos.debito', 
        'facturacaos.credito', 'facturacaos.divida', 'total_contratada', 
        'facturacaos.banda_facturada', 'Valor_pago', 'valor_facturado', 'aumento', 
        'total_diminuicao')->get();

        

        $total_valor_facturado = $data->sum('valor_facturado');
        $total_divida = $data->sum('divida');
        $total_debido = $data->sum('debido');
        $total_credito = $data->sum('credito');
         
        return view('back.pages.printers.facturacao', compact('data','total_valor_facturado','total_divida','total_debido','total_credito'));


    }

    public function geral(){
 
    
         
        $data = DB::table('facturacaos')
            ->join('empresas', 'facturacaos.empresa_id', '=', 'empresas.id') // Faz o join das tabelas
            ->select(
            'facturacaos.comprovativo',
                'empresas.empresa',
                'facturacaos.debito',
                'facturacaos.credito',
                'facturacaos.largura_banda_contratada as banda_contratada',
                'facturacaos.valor_facturado as valor_facturado',
                'facturacaos.valor_pago as valor_pago',
                'facturacaos.aumento_banda as banda_aumento',
                'facturacaos.diminuicao_banda as diminuicao_banda',
                'facturacaos.divida as divida',
                'facturacaos.data_facturacao as data'
            )
            ->where('facturacaos.divida', '>', 0) // Empresas individadas
        ->get();  

        return view('back.pages.consultas.dividas', compact('data'));


    }

    public function ByEmpresa(Request $request){

    
        $SomaDividas = DB::table('facturacaos')
            ->join('empresas', 'facturacaos.empresa_id', '=', 'empresas.id')
                ->select(
                    
                    //'facturacaos.comprovativo',
                    'empresas.empresa',
                    
                    DB::raw('SUM(facturacaos.divida) as divida') // Soma as dividas
                    
                )
            ->where('facturacaos.divida', '>', 0)
                //->groupBy('facturacaos.comprovativo')
                ->groupBy('empresas.empresa') // Ordenar PorEmpresa
                 
                //->groupBy('facturacaos.data_facturacao as data')
                
        ->get();
        

        //dd($SomaDividas);
        return view('back.pages.consultas.dividas', compact('SomaDividas'));
    
    
    }


}