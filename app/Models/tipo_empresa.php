<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_empresa extends Model
{
    use HasFactory;

    protected $table = 'tipo_empresas';
    protected $fillable = [
        'id',
        'tipo',
    ];

}
