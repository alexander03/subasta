<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Proceso extends Model
{
    use SoftDeletes,HasFactory, InteractsWithMedia;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fechainicio',
        'fechafin',
        'tipo',
        'situacion',
        'modalidad',
        'proceso_id',
        'bases',
        'preciobase',
        'tiempo'
    ];

    public function proceso()
    {
        return $this->hasOne(Proceso::class,'id','proceso_id');
    }

    public function bienes()
    {
        return $this->hasMany(Bien::class,'proceso_id','id');
    }

    public function etapas()
    {
        return $this->hasMany(Etapa::class,'proceso_id','id');
    }
}
