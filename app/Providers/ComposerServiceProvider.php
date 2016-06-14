<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['principal.principal','frontend.peliculas','frontend.actores','frontend.directores','frontend.pelicula_individual','frontend.series','frontend.actores_individual','frontend.directores_individual','frontend.serie_individual','frontend.capitulo_indiv','frontend.oscars','frontend.trailer','frontend.noticias_peliculas','frontend.noticia_pelicula_individual','frontend.noticia_actor_individual','frontend.noticias_series','frontend.noticias_actores','frontend.noticia_serie_individual'], 'App\Http\ViewComposer\AsideComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
