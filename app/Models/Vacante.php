<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $dates = ['ultimo_dia'];

    protected $fillable = [ 
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id',
    ];

    //relacion para traer los nombres de laas categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);

    }
    //relaciion para traer los valores de la tabla salario
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }
}
