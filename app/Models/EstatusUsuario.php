<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusUsuario extends Model
{
    use HasFactory;

    protected $table = 'estatus_usuarios';
    protected $primaryKey = 'idestado';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre'
    ];
}
