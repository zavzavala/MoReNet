<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\facturacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class AutorController extends Controller
{
    public function index(Request $request){

        $data = DB::table('facturacaos')->get();
        /////////////////////////////////////////
        $meses_factura = DB::select(DB::raw('select MONTHNAME (data_facturacao) as mes,
            format(sum(valor_facturado),2,\'de_DE\') as total
                from facturacaos
                    group by mes'));
        ////////////////////////////////////

        $facturado = $data->sum('valor_facturado');
        $debito = $data->sum('debito');
 
        /*$mes_credito = DB::select(DB::raw('select monthname(data_facturacao) as mes_credito,
                                        format(sum(credito), 2, \'de_DE\') as total_credito
                                        from facturacaos group by mes_credito')); */

                                        
       /*  $mes_debito = DB::select(DB::raw('select monthname(data_facturacao) as mes_debito,
            sum(debito) as total_debito from facturacaos group by mes_debito'));
        */

        ///Usando Eloquent
        $data_debito = DB::table('facturacaos')
            ->selectRaw('MONTHNAME(data_facturacao) as mes_debito, SUM(debito) as total_debito')
                ->groupBy('mes_debito')
                    ->get();

                    $dat_debitos = [];
                    foreach ($data_debito as $item) {
                        $dat_debitos[] = [
                            'mes_debito' => $item->mes_debito,
                            'total_debito' => $item->total_debito,
                        ];
                    }
                //$dat_debito = $dat_debitos[0];Este foi modificadono dia 18/julho/2024, na Santa Isabel
        /* $mes_credito = DB::table('facturacaos')
        ->selectRaw('MONTHNAME(data_facturacao) as mes_credito,sum(credito) as total_credito')
       
        ->groupBy('mes_credito')
        ->get(); */
           
        $data_credito = DB::table('facturacaos')
            ->selectRaw('MONTHNAME(data_facturacao) as mes_credito, SUM(credito) as total_credito')
                ->groupBy('mes_credito')
                    ->get();

        $dat_creditos = [];
        foreach ($data_credito as $item) {
            $dat_creditos[] = [
                'mes_credito' => $item->mes_credito,
                'total_credito' => $item->total_credito,
            ];
        }
        //$dat_credito = $dat_creditos[0];Este foi modificadono dia 18/julho/2024, na Santa Isabel. NB:Assim ele so pega um registo, idem para debitos
        $dat_debito = $dat_debitos;
        $dat_credito = $dat_creditos;
        //dd($dat_debitos);
        //dd($dat_creditos);


        //dd($dat_credito['total_credito']);
        //dd($dat_debito['total_debito']);

        return view('back.pages.home', compact('facturado', 'debito', 'meses_factura', 'dat_credito','dat_debito'));
        
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('autor.login');

    }

    public function ResetForm(Request $request, $token = null){

        $data = [
            'pageTitle'=>'Resetar Password'
        ];

        return view('back.pages.auth.reset',$data)->with(['token'=>$token, 'email'=>$request->email]);  
    }

    public function changeProfilePicture(Request $request){
        $user = User::find(auth('web')->id());
        $path = 'back/dist/img/perfil';
        $file = $request->file('file');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $new_picture_name = 'MNet'.$user->id.time().rand(1,100000).'.jpg';

        if($old_picture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $user->update([
                'picture'=>$new_picture_name
            ]);
            return response()->json(['status'=>1, 'msg'=>'Imagem Carregada com sucesso!']);
        }else{
            return response()->json(['status'=>0,'msg'=>"ERRO ao tentar carregar imagem de perfil"]);
        }

    }
}
