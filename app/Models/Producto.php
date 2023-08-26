<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Producto extends Model implements HasMedia
{
    use SoftDeletes,HasFactory, InteractsWithMedia;
    protected $fillable = [
        'nombre',
        'descripcion',
        'valor',
        'situacion',
        'categoria_id'
    ];
    protected $with = ['categoria', 'media'];

    public function categoria()
    {
        return $this->hasOne(Categoria::class,'id','categoria_id');
    }
}
