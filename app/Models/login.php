<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class login extends Model
{
    //
     use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'foto', // Agregar el campo 'foto' al array de fillable
    ];
}
 