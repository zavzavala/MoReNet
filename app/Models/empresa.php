<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empresa extends Model
{
    //use HasFactory;
    use HasFactory, SoftDeletes;

    protected $table = 'empresas';
    
    //protected $dates = ['deleted_at'];
    
    //public $timestamps = 'true';

    protected $fillable = [
        'user_id',
        'empresa',
        'largura_banda_contratada',
        'telefone',
        'email',
        'localizacao',
        'data_contrato',
        'nuit',
        'descricao',
        'tipo_empresa',
      
        'url',
        
    ];

    public function scopeSearch($query, $term){

        $term = "%$term%";

        $query->where(function($query) use ($term){
            $query->where('empresa', 'like', $term)
                ->orWhere('tipo_empresa', 'like', $term);
        });
        
    }
}
