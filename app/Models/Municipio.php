<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'cat_municipios';
    protected $primaryKey = 'idmunicipio';
    public $timestamps = false;

    protected $fillable = [
        'idmunicipio',
        'idestado',
        'municipio',
    ];
}
