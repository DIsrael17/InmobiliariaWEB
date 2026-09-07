<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotosInmobiliaria extends Model
{
    //
    // use HasFactory;

    protected $table = 'fotos_inmobiliaria';

    protected $fillable = [
        'inmobiliaria_id',
        'foto',
        'fecha_publicacion'
    ];

    // Relación con Inmobiliaria
    public function propiedad()
    {
        return $this->belongsTo(Inmobiliaria::class, 'inmobiliaria_id');
    }
}
