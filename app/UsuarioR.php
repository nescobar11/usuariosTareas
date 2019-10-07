<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioR extends Model
{
    protected $fillable = [
        'nombre_completo', 'correo', 'tareas'
    ];
}
