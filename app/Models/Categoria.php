<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Categoria extends Model
{
    //
     use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'fecha_publicacion'
    ];

    // Relación con Inmobiliaria
    public function propiedades()
    {
        return $this->hasMany(inmobiliaria::class, 'categoria_id');
    }
}
