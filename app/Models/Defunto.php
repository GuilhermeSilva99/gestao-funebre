<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Defunto extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'historia',
        'tumulo_id',
    ];
}
