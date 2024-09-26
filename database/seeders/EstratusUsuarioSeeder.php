<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstatusUsuario;

class EstratusUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstatusUsuario::create(['id' => 1, 'nombre' => 'Activo']);
        EstatusUsuario::create(['id' => 2, 'nombre' => 'Inactivo']);
    }
}
