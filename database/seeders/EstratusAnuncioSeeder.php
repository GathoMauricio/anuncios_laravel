<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstatusAnuncio;

class EstratusAnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstatusAnuncio::create(['id' => 1, 'nombre' => 'Limitado']);
        EstatusAnuncio::create(['id' => 2, 'nombre' => 'Premium']);
    }
}
