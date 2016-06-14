<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Serie;
use App\Genero;
use App\Actor;
use App\Director;
use App\Cartel_Serie;
use DB;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use App\Capitulo;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    $series = Serie::Searchserie($request->titulo)->orderBy('id','DESC')->paginate(5);

    $total_series = Serie::orderBy('id','DESC')->count();        

    $generos = Genero::orderBy('genero','ASC')->where('tipo','=','series')->lists('genero', 'id');   
    $actores = Actor::orderBy('nombre','ASC')->lists('nombre','id');
    $directores = Director::orderBy('nombre','ASC')->lists('nombre','id');


     return view('admin.series.index')
        ->with('series', $series)
        ->with('total',$total_series)
        ->with('generos',$generos)
        ->with('actores',$actores)
        ->with('directores',$directores);
    }

    public function indexFrontSeries(Request $request)
    {
        $series = Serie::SearchforWord($request->word)->orderBy('id','DESC')->paginate(10);

        $total_series = Serie::orderBy('id','DESC')->count();

        $seri = $series->all();
        foreach ($seri as $key) {
            $sinopsis_sintags = strip_tags($key->sinopsis);            
            $key->sinopsis = substr($sinopsis_sintags, 0, 120) . "...";
        }   

        $fecha_hoy = Carbon::now();
        $genero_view = "All Series";

        return view('frontend.series')
            ->with('series',$series)
            ->with('total',$total_series)
            ->with('fecha_hoy',$fecha_hoy)
            ->with('genero_view',$genero_view);
    }

    public function filterseriesporletra($letra)
    {        
        $series = Serie::SearchFilterporLetra($letra)->orderBy('id','DESC')->paginate(10); 
        $total_series = Serie::orderBy('id','DESC')->count();

        $seri = $series->all();
        foreach ($seri as $key) {
            $sinopsis_sintags = strip_tags($key->sinopsis);            
            $key->sinopsis = substr($sinopsis_sintags, 0, 120) . "...";
        }

        $fecha_hoy = Carbon::now();
        $filtro = $letra;
        if($filtro == "num"){
            $genero_view = "#";
        }else{
            $genero_view = $filtro;            
        }


        return view('frontend.series')
            ->with('series',$series)
            ->with('total',$total_series)
            ->with('fecha_hoy',$fecha_hoy)
            ->with('genero_view',$genero_view);
    }

    public function seriespendientes(){
        $series = Serie::orderBy('id','DESC')->where('status_poster', '=', 'no')->orWhere('status_datos', '=','no')->paginate(10);       
        
        return view('admin.series.series_pendientes')
            ->with('series',$series);
    }

    public function individual($id){

        $serie = Serie::find($id);
        $serie->sinopsis = strip_tags($serie->sinopsis); 
        $num_seasons = $serie->temporadas;
        $genero_view = "All Series";

        $capitulos = $serie->capitulos;

        $cap_array = $capitulos->all();
        foreach ($cap_array as $key) {   
           $key->sinopsis_capitulo = strip_tags($key->sinopsis_capitulo);                       
        }   

        return view('frontend.serie_individual')
            ->with('serie',$serie)
            ->with('genero_view',$genero_view)
            ->with('num_seasons',$num_seasons)
            ->with('capitulos', $capitulos);

    }

    public function calc_Puntuacion(Request $request){        

        $estrellas = $request->stars;  
        $id_serie = $request->id_serie;  

        $serie = Serie::find($id_serie);  

        $total_votos =  $serie->total_votos;  
        $suma_estrellas = $serie->suma_estrellas; 

        $total_votos = $total_votos + 1; 

        $suma_estrellas = $suma_estrellas + $estrellas;  

        $rating_calculado = $suma_estrellas / $total_votos;  

        $rating_calculado = round($rating_calculado, 1);

        $update = DB::table('series')
                ->where('id', $id_serie)
                ->update(['total_votos' => $total_votos, 'suma_estrellas' => $suma_estrellas,'rating' => $rating_calculado]);

        return response()->json([
                "rating" => $rating_calculado,
                "total_votos" => $total_votos
        ]);
    }       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
       //dd($request);
       // manipulacion de imagenes
        if($request-> file('image')){  // si viene un archivo en el request llamado image
            $file = $request->file('image');
            $name = 'Scorpioncine_Serie' . time() .'.' . $file->getClientOriginalExtension();
            $path = public_path() . '/img/series/carteles/';
            $file->move($path, $name);
        }else{
            $name = 'niimage.jpg';  // cuando no haya imagen
        }

        $series = new Serie($request->all());

           // manipulacion de los actores para guardar solo 2 en el campo cast de la pelicula
        $actores = DB::table('actores')
            ->whereIn('id', $request->actores)
            ->get(); 

        $num = sizeof($actores);   
        $cadena = null;                    

        for($i = 0; $i < $num ; $i++) {
            if($i < 2){
                if($i == 0){
                    $cadena = $actores[$i]->nombre;                
                }else{
                    $cadena = $cadena . ", " . $actores[$i]->nombre;
                }                 
            } 
        }

        $series->cast = $cadena;
        $series->sinopsis = strip_tags($series->sinopsis);  
        $series->rating = "0";
        // FIN //

        $series->save();       

        $series->generos()->sync($request->generos);
        $series->actores()->sync($request->actores);
        $series->directores()->sync($request->directores);

        $image = new Cartel_Serie();
        $image->name = $name;
        $image->serie()->associate($series);  // llama a la funcion article() del modelo Image, y con asosociate, une con el campo que los une, o sea, el article_id
        $image->save();

        Flash::success('Se ha creado la serie ' . $series->titulo_serie . ' de forma satisfactoria!');
        return redirect()->route('admin.series.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $series = Serie::find($id); 
        $generos = Genero::orderBy('genero','DESC')->where('tipo','=','series')->lists('genero','id');
        $actores = Actor::orderBy('nombre','ASC')->lists('nombre','id');
        $directores = Director::orderBy('nombre','ASC')->lists('nombre','id');

        $my_generos = $series->generos->lists('id')->ToArray();
        $my_actors = $series->actores->lists('id')->ToArray();
        $my_directors = $series->directores->lists('id')->ToArray();

        return view('admin.series.edit')            
            ->with('series', $series)
            ->with('generos', $generos)
            ->with('actores', $actores)
            ->with('directores', $directores)
            ->with('my_generos', $my_generos)
            ->with('my_directors', $my_directors)
            ->with('my_actors',$my_actors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
         // manipulacion de imagenes
        if($request-> file('image')){  // si viene un archivo en el request llamado image
            $file = $request->file('image');
            $name = 'Scorpioncine_Serie' . time() .'.' . $file->getClientOriginalExtension();   // NOMBRE DEL ARCHIVO QUE VIENE
            $path = public_path() . '/img/series/carteles/';

            // captura el cartel
            $cartel = Cartel_Serie::where('serie_id', $id)
               ->orderBy('name', 'DESC')
               ->get();

            // pasa a un array el objeto cartel
            $image_array = $cartel->all();  // array

            // borra el archivo de la imagen previa
            foreach ($image_array as $valor) {
                $vari = $valor["name"];  
                $path2 = public_path() . '/img/series/carteles/' . $vari;
                unlink($path2);
            }       
            // fin borrado imagen previa

            $update = DB::table('carteles_series')
                ->where('serie_id', $id)
                ->update(['name' => $name]);

            $file->move($path, $name);  // mueve la nueva imagen al path
        }


        $serie = Serie::find($id);  

        $serie->fill($request->all());

        $serie->save();        

        $serie->generos()->sync($request->generos);
        $serie->actores()->sync($request->actores);
        $serie->directores()->sync($request->directores);

        Flash::warning('Se ha editado la serie ' . $serie->titulo_serie . ' de forma exitosa!');
        return redirect()->route('admin.series.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        if($request->ajax()){ 

        $serie = Serie::find($id);
        $cartel = Cartel_Serie::where('serie_id', $id)
               ->orderBy('name', 'DESC')
               ->get();
        
        // se borran los registros relacionados de la tabla pivote primero, y luego se elimina la pelicula
        $deleted = DB::delete('delete from genero_serie WHERE serie_id = ?' , [$id]);
        $deleted2 = DB::delete('delete from actor_serie WHERE serie_id = ?' , [$id]);
        $deleted2 = DB::delete('delete from director_serie WHERE serie_id = ?' , [$id]);
        
        $image_array = $cartel->all();  // array

        // borra el archivo de la imagen
        foreach ($image_array as $valor) {
            $vari = $valor["name"];  // se le asigna el nuevo formato al array 
            $path = public_path() . '/img/series/carteles/' . $vari;
            unlink($path);
        }         
               
        $serie->delete();

        return response()->json([
                "mensaje" => "Bien!!!!"
            ]);        
        }       

       
    }


}

