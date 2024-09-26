<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusAnuncio extends Model
{
    use HasFactory;

    protected $table = 'estatus_anuncios';
    protected $primaryKey = 'idestado';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre'
    ];
}
