<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proceso extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = [
        'fechainicio',
        'fechafin',
        'tipo',
        'situacion',
        'modalidad',
        'proceso_id'
    ];

    public function proceso()
    {
        return $this->hasOne(Proceso::class,'id','proceso_id');
    }
}
