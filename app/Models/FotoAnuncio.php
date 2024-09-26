<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoAnuncio extends Model
{
    use HasFactory;

    protected $table = 'fotos_anuncios';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'anuncio_id',
        'ruta',
        'descripcion',
    ];
}
