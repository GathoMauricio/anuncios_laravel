<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'categoria_id',
        'nombre',
        'icono',
    ];
}
