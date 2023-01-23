<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moth extends Model
{
    use HasFactory;

    protected $table = 'moths';
    protected $fillable = [
        'mes'
    ];
}
