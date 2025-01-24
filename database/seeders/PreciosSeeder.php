<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anuncio;

class PreciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anuncios = Anuncio::all();
        foreach ($anuncios as $anuncio) {
            $this->command->getOutput()->writeln($anuncio->precio);
            if (strpos($anuncio->precio, 'dlls')) {

                $anuncio->divisa = "USD";
            } else {
                $anuncio->divisa = "MXN";
            }

            $precio = explode('.', $anuncio->precio)[0];
            $precio = filter_var($precio, FILTER_SANITIZE_NUMBER_INT);
            $anuncio->precio = $precio;
            $anuncio->save();
        }
    }
}
