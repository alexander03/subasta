<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscripcion extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = [
        'fecha',
        'monto',
        'situacion',
        'facturacion',
        'comentario',
        'etapa_id',
        'bien_id',
        'usuario_id'
    ];

    public function bien()
    {
        return $this->hasOne(Bien::class,'id','bien_id');
    }

    public function etapa()
    {
        return $this->hasOne(Etapa::class,'id','etapa_id');
    }

    public function usuario()
    {
        return $this->hasOne(User::class,'id','usuario_id');
    }

}
