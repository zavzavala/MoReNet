<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class facturacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'facturacaos';

    public $timestamps = 'true';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'user_id',
        'largura_banda_contratada',
        'aumento_banda',
        'preco_unitario',
        'banda_facturada',
        'valor_facturado',
        'data_aumento_banda',
        'diminuicao_banda',
        'data_diminuicao_banda',
        'comprovativo',
        'data_facturacao',
        'valor_pago',
        'credito',
        'debito',
        'divida'
    ];

    public function empresa_factura(){
        return $this->belongsTo(empresa::class,'empresa_id', 'id');

        
    }
     
   /*  public function empresa_factura(){
        return $this->hasMany(empresa::class)
        ->select(\DB::raw('*'))
        ->groupBy('id')
        ->orderBy('id','desc');
    } */
    

}
