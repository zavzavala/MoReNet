<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anexos extends Model
{
    use HasFactory;
    protected $table = 'anexos';

    protected $fillable = [
        'empresa_id',
        'user_id',
        'url',
        'descricao',
    ];

    public function empresa(){

        return $this->belongsTo(empresa::class, 'empresa_id', 'id');

    }

    public function usuario(){

        return $this->belongsTo(User::class, 'user_id', 'id');
        
    }

}
