<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inmobiliaria extends Model
{
    //

   // use HasFactory;

    protected $table = 'inmobiliaria';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'categoria_id',
        'descripcion',
        'comentario',
        'precio',
        'contacto',
        'fecha_publicacion'
    ];

    // Relación con Categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Relación con Fotos
    public function fotos()
    {
        return $this->hasMany(FotosInmobiliaria::class, 'inmobiliaria_id');
    }

    // Relación con Comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'inmobiliaria_id');
    }
    protected $casts = [
        'fecha_publicacion' => 'date',
    ];

}
