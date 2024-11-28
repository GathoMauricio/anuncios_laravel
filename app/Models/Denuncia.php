<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;

    protected $table = 'denuncias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'anuncio_id',
        'motivo',
        'ip',
    ];

    public function anuncio()
    {
        return $this->hasOne(Anuncio::class, 'id', 'anuncio_id');
    }
}
