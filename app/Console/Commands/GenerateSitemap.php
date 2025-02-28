<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Genera un sitemap.xml para el sitio web';

    public function handle()
    {
        Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/condiciones'))
            ->add(Url::create('/privacidad'))
            ->add(Url::create('/android-app'))
            ->add(Url::create('/home'))
            ->add(Url::create('/municipios'))
            ->add(Url::create('/ver_anuncio'))
            ->add(Url::create('/buscar'))
            ->add(Url::create('/todo'))
            ->add(Url::create('/anuncios'))
            ->add(Url::create('/mis_anuncios'))
            ->add(Url::create('/editar_anuncio'))
            ->add(Url::create('/pago_exitoso'))
            ->add(Url::create('/hacer_premium'))
            ->add(Url::create('/subcategorias'))
            ->add(Url::create('/actualizar_cuenta'))
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generado correctamente.');
    }
}
