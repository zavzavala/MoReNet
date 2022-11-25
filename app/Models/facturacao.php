<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class facturacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'facturacaos';

    public $timestamps = 'true';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'largura_banda',
        'aumento_banda',
        'preco_unitario',
        'ano',
        'mes',
        'n_factura',
        'valor_facturado',
        'debito',
        'credito',
        'valor_pago',
        'divida_saldo',
        'data_pagamento',
        'n_documento'
    ];

    public function empresa_factura(){
        return $this->belongsTo(empresa::class,'empresa_id', 'id');
    }
}
