<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Nombre explícito de la tabla si es necesario (Laravel asume plural)
    protected $table = 'productos';

    // Campos que pueden ser asignados masivamente (mass assignment)
    protected $fillable = [
        'sku',
        'nombre',
        'descripcion',
        'cantidad',
        'precio',
        'total',
        'fecha_creacion',
    ];

    // Desactiva timestamps automáticos si no tienes created_at/updated_at
    public $timestamps = false;

    // Si quieres que 'fecha_creacion' sea tratado como Carbon (fecha)
    protected $dates = [
        'fecha_creacion',
    ];
}
