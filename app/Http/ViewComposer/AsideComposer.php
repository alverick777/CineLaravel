<?php

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\NoticiasPrincipal;
use App\Pelicula;
use App\Serie;
use App\Actor;
use App\Director;
use App\Genero;
use App\Trailer;
use DB;


class AsideComposer{

public function compose(View $view){
		$total_peliculas = Pelicula::orderBy('id','DESC')->count();
        $total_series = Serie::orderBy('id','DESC')->count(); 
		$total_actores = Actor::orderBy('id','DESC')->count();
		$total_directores = Director::orderBy('id','DESC')->count();        
        $total_trailers = Trailer::orderBy('id','DESC')->count();
        $total_actrices = Actor::orderBy('id','DESC')->where("sexo","=","F")->count();
        $total_actoresmasculinos = Actor::orderBy('id','DESC')->where("sexo","=","M")->count();
        $totalfemaledirectors = Director::orderBy('id','DESC')->where("sexo","=","F")->count();
		$totalmaledirectors = Director::orderBy('id','DESC')->where("sexo","=","M")->count();

		$pelis = DB::table('genero_pelicula')
			->join('generos', 'genero_pelicula.genero_id', '=', 'generos.id')
            ->select('generos.genero', DB::raw('count(*) as total'))
            ->groupBy('genero_id')
            ->get();
          

		$series = DB::table('genero_serie')
			->join('generos', 'genero_serie.genero_id', '=', 'generos.id')
            ->select('generos.genero', DB::raw('count(*) as total'))
            ->groupBy('genero_id')
            ->get();           


			$view->with('total_peliculas',$total_peliculas)
        	->with('total_series',$total_series)
        	->with('total_actores',$total_actores)
        	->with('total_directores',$total_directores)
            ->with('total_trailers',$total_trailers)
            ->with('total_actrices',$total_actrices)
            ->with('total_actoresmasculinos',$total_actoresmasculinos)
            ->with('totalfemaledirectors',$totalfemaledirectors)
            ->with('totalmaledirectors',$totalmaledirectors)
        	->with('peliculas666',$pelis)
        	->with('series666',$series);

}  // fin compose

}


