<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Subcategoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::truncate();
        Subcategoria::truncate();

        $categoria = Categoria::create(['nombre' => 'Casas', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Casas en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Casas en Venta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Casas en Preventa', 'icono' => 'home']);

        $categoria = Categoria::create(['nombre' => 'Departamentos', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Departamentos en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Departamentos en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Departamentos en Renta', 'icono' => 'home']);

        $categoria = Categoria::create(['nombre' => 'Terrenos', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Terrenos en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Terrenos en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Terrenos en Renta', 'icono' => 'home']);

        $categoria = Categoria::create(['nombre' => 'Locales', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Locales en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Locales en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Locales en Renta', 'icono' => 'home']);

        $categoria = Categoria::create(['nombre' => 'Bodegas', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Bodegas en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Bodegas en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Bodegas en Renta', 'icono' => 'home']);


        $categoria = Categoria::create(['nombre' => 'Renta vacacional', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Casas en Renta Vacacional', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Villas en Renta Vacacional', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Cabañas en Renta Vacacional', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Departamentos en Renta Vacacional', 'icono' => 'home']);

        $categoria = Categoria::create(['nombre' => 'Oficinas', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Oficinas en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Oficinas en Renta', 'icono' => 'home']);
        Subcategoria::create(['categoria_id' => $categoria->id, 'nombre' => 'Oficinas en Renta', 'icono' => 'home']);
    }
}
