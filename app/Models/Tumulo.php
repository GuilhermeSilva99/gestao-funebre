<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tumulo extends Model
{
    protected $fillable = [
        'nome',
        'numero',
        'codigo_qr',
        'cemiterio_id'
    ];
}
