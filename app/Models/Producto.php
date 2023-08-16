<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes,HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'valor',
        'portada',
        'situacion',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->hasOne(Categoria::class,'id','categoria_id');
    }
}
