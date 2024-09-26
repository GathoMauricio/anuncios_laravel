<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    use HasFactory;

    protected $table = 'cat_cp';
    protected $primaryKey = 'idcp';
    public $timestamps = false;

    protected $fillable = [
        'idcp',
        'idmunicipio',
        'idestado',
        'cp',
        'colonia',
    ];
}
