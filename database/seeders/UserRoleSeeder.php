<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRol;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRol::truncate();
        UserRol::create(['id' => 1, 'rol' => 'Cliente']);
        UserRol::create(['id' => 2, 'rol' => 'Administrador']);
    }
}
