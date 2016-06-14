<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NoticiasPrincipal;
use App\NoticiaSerie;
use App\NoticiaActor;
use App\Pelicula;
use App\Serie;
use App\Actor;
use App\Director;
use App\Genero;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = NoticiasPrincipal::orderBy('id','DESC')->take(4)->get();

        $notis = $noticias->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        }   

        $noticias_serie = NoticiaSerie::orderBy('id','DESC')->take(4)->get();

        $notis = $noticias_serie->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        }   

        $noticias_actor = NoticiaActor::orderBy('id','DESC')->take(4)->get();

        $notis = $noticias_actor->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        } 


        return view('principal.principal')
        	->with('noticias',$noticias)
          ->with('noticias_serie',$noticias_serie)
          ->with('noticias_actor',$noticias_actor);
    }

    public function filter($name){  // funcion que retorna las peliculas filtradas por genero
       $generos = Genero::SearchFilter($name)->get();       
       $genero_peliculas = $generos->where('tipo','pelicula')->first();
       $genero_view = $genero_peliculas->genero; 
       $peliculas = $genero_peliculas->peliculas()->orderBy('id','DESC')->paginate(10);       
       
       $pelis = $peliculas->all();
       foreach ($pelis as $key) {
          $sinopsis_sintags = strip_tags($key->sinopsis); // elimina los tag html (<p>, <span>, etc)           
          $key->sinopsis = substr($sinopsis_sintags, 0, 120) . "...";  // solo toma 120 caracteres de la cadena de texto de la sinopsis          
       }

        $fecha_hoy = Carbon::now();      

        return view('frontend.peliculas')
            ->with('peliculas',$peliculas)            
            ->with('fecha_hoy',$fecha_hoy)
            ->with('genero_view',$genero_view);
    }

    public function filterSeries($name){  // funcion que retorna las peliculas filtradas por genero
       $generos = Genero::SearchFilter($name)->get();       
       $genero_series = $generos->where('tipo','series')->first();
       $genero_view = $genero_series->genero; 
       $series = $genero_series->series()->orderBy('id','DESC')->paginate(10);       
       
       $seri = $series->all();
       foreach ($seri as $key) {
          $sinopsis_sintags = strip_tags($key->sinopsis); // elimina los tag html (<p>, <span>, etc)           
          $key->sinopsis = substr($sinopsis_sintags, 0, 120) . "...";  // solo toma 120 caracteres de la cadena de texto de la sinopsis          
       }

        $fecha_hoy = Carbon::now();      

        return view('frontend.series')
            ->with('series',$series)            
            ->with('fecha_hoy',$fecha_hoy)
            ->with('genero_view',$genero_view);
    }
 
}
