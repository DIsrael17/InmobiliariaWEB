<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    // use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'inmobiliaria_id',
        'user_id',
        'comentario',
        'fecha_publicacion'
    ];

    // Relación con Inmobiliaria
    public function propiedad()
    {
        return $this->belongsTo(Inmobiliaria::class, 'inmobiliaria_id');
    }

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
