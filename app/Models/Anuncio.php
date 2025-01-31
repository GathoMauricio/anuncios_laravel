<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anuncio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'anuncios';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'estatus_id',
        'categoria_id',
        'subcategoria_id',
        'estado_id',
        'municipio_id',
        'colonia_id',
        'cp',
        'calle_numero',
        'titulo',
        'descripcion',
        'precio',
        'divisa',
        'negociable',
        'metodo_pago',
        'referencia_pago',
        'borrador',
        'recamaras',
        'banos',
        'estacionamiento',
        'antiguedad',
        'niveles',
    ];

    public function cliente()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }

    public function estatus()
    {
        return $this->hasOne(EstatusAnuncio::class, 'id', 'estatus_id');
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

    public function subcategoria()
    {
        return $this->hasOne(Subcategoria::class, 'id', 'subcategoria_id');
    }

    public function estado()
    {
        return $this->hasOne(Estado::class, 'idestado', 'estado_id');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class, 'idmunicipio', 'municipio_id');
    }

    public function colonia()
    {
        return $this->hasOne(Colonia::class, 'idcp', 'colonia_id');
    }

    public function sepomex()
    {
        return $this->hasOne(Sepomex::class, 'id', 'colonia_id');
    }

    public function fotos()
    {
        return $this->hasMany(FotoAnuncio::class, 'anuncio_id', 'id');
    }
}
