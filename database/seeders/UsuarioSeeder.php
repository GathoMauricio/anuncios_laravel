<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'rol_id' => 2,
            'estatus_id' => 1,
            'name' => 'Said',
            'apaterno' => 'Brahimi',
            'amaterno' => 'Rojas',
            'email' => 'bolsax4@gmail.com',
            'telefono' => '',
            'password' => '$2y$10$pqrhxXxA1YsTBDMZ6BmYZO/QfdNNaZCKRFi4MpzUGRT5WMMH1NoyW',
        ]);
        User::create([
            'rol_id' => 2,
            'estatus_id' => 1,
            'name' => 'SaxbRojas',
            'apaterno' => '',
            'amaterno' => '',
            'email' => 'licsbr@gmail.com',
            'telefono' => '525529010938',
            'password' => '$2y$10$pqrhxXxA1YsTBDMZ6BmYZO/QfdNNaZCKRFi4MpzUGRT5WMMH1NoyW',
        ]);
        User::create([
            'rol_id' => 1,
            'estatus_id' => 1,
            'name' => 'Saenz',
            'apaterno' => '',
            'amaterno' => '',
            'email' => 'licsbr@yahoo.com',
            'telefono' => '',
            'password' => '$2y$10$5WAhb8kOiMcH/4JLM.YpGOBRYl/FIZ3lv7P6PVd6vaQKby159xawe',
        ]);
        User::create([
            'rol_id' => 1,
            'estatus_id' => 1,
            'name' => 'Sainz',
            'apaterno' => '',
            'amaterno' => '',
            'email' => 'licsbr@hotmail.com',
            'telefono' => '',
            'password' => '$2y$10$6IwiWgbd.gjfmMTpHGPT/OgeER.uTH.TstIWgybDtCYuIcrv6Pwla',
        ]);
        User::create([
            'rol_id' => 1,
            'estatus_id' => 1,
            'name' => 'Xenttrum',
            'apaterno' => 'Inmobiliaria',
            'amaterno' => '',
            'email' => 'xenttrum@gmail.com',
            'telefono' => '525568106472',
            'password' => '$2y$10$pCAi.rcw9MGmX4PxNy62yeDdSxEudjIYbw4zLTTHKL.TvixnHQ6TW',
        ]);
        User::create([
            'rol_id' => 1,
            'estatus_id' => 1,
            'name' => 'prueba',
            'apaterno' => '',
            'amaterno' => '',
            'email' => 'prueba@prueba.com',
            'telefono' => '',
            'password' => '$2y$10$Qqe2MzJwKuRbUBCuyYq2SunBjs1GgEYhKiKhOxXVUbUtaw6SqdBli',
        ]);
        User::create([
            'rol_id' => 1,
            'estatus_id' => 1,
            'name' => 'Belen',
            'apaterno' => '',
            'amaterno' => '',
            'email' => 'isobienesraices@gmail.com',
            'telefono' => '',
            'password' => '$2y$10$AVAlEaE66kLtE4UQ0iqX1.n9KJ4rCEcn5OpDPFOnOnZv61h1aLHDi',
        ]);
        User::create([
            'rol_id' => 1,
            'estatus_id' => 1,
            'name' => 'josee',
            'apaterno' => '',
            'amaterno' => '',
            'email' => 'salmart3020@gmail.com',
            'telefono' => '',
            'password' => '$2y$10$20dILFKcqQCf/ws1zzbAlOmjbT8QMIUfFj/1u4K6ZYGrps38eo42S',
        ]);
        User::create([
            'rol_id' => 1,
            'estatus_id' => 1,
            'name' => 'EGAAPdhgHI',
            'apaterno' => '',
            'amaterno' => '',
            'email' => 'curtsdawne267283@outlook.com',
            'telefono' => '524409735330',
            'password' => '$2y$10$myfcjfH2BahEi55JYmjgwOE7AWk52dS9bzCnFAdnik2r1BNdMUOH.',
        ]);
    }
}
