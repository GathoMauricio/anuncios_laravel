<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'cat_estados';
    protected $primaryKey = 'idestado';
    public $timestamps = false;

    protected $fillable = [
        'idestado',
        'estado',
    ];
}
