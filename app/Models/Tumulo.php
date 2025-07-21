<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tumulo extends Model
{
    protected $fillable = [
        'nome',
        'numero',
        'cemiterio_id'
    ];
}
