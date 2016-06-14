<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Genero;
use App\Pelicula;
use App\Actor;
use App\Director;
use App\Cartel;
use Laracasts\Flash\Flash;
use DB;
use Carbon\Carbon;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $peliculas = Pelicula::Searchpelicula($request->titulo)->orderBy('id','DESC')->paginate(5);

        $total_peliculas = Pelicula::orderBy('id','DESC')->count();
        
        return view('admin.peliculas.index')
            ->with('peliculas',$peliculas)
            ->with('total',$total_peliculas);
    }

    public function indexFront(Request $request)
    {
        $peliculas = Pelicula::SearchforWord($request->word)->orderBy('id','DESC')->paginate(10);

        $total_peliculas = Pelicula::orderBy('id','DESC')->count();

        $pelis = $peliculas->all();
        foreach ($pelis as $key) {
            $sinopsis_sintags = strip_tags($key->sinopsis);            
            $key->sinopsis = substr($sinopsis_sintags, 0, 120) . "...";
        }   

        $fecha_hoy = Carbon::now();
        $genero_view = "All Movies";

        return view('frontend.peliculas')
            ->with('peliculas',$peliculas)
            ->with('total',$total_peliculas)
            ->with('fecha_hoy',$fecha_hoy)
            ->with('genero_view',$genero_view);
    }

    public function filterLetra($letra)
    {        
        $peliculas = Pelicula::SearchFilterporLetra($letra)->orderBy('id','DESC')->paginate(10); 
        $total_peliculas = Pelicula::orderBy('id','DESC')->count();

        $pelis = $peliculas->all();
        foreach ($pelis as $key) {
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


        return view('frontend.peliculas')
            ->with('peliculas',$peliculas)
            ->with('total',$total_peliculas)
            ->with('fecha_hoy',$fecha_hoy)
            ->with('genero_view',$genero_view);
    }


    public function individual($id){

        $pelicula = Pelicula::find($id);

        $pelicula->sinopsis = strip_tags($pelicula->sinopsis);

        $year = $pelicula->year;
                
        $genero_view = "All Movies";
     

        return view('frontend.pelicula_individual')
            ->with('pelicula',$pelicula)
            ->with('genero_view',$genero_view);

    }
    
    public function pendientes(){
        $peliculas = Pelicula::orderBy('id','DESC')->where('status_poster', '=', 'no')->orWhere('status_datos', '=','no')->paginate(10);       
        
        return view('admin.peliculas.peliculas_pendientes')
            ->with('peliculas',$peliculas);
    }

    public function calc_Puntuacion(Request $request){        

        $estrellas = $request->stars;  
        $id_pelicula = $request->id_pelicula;  

        $pelicula = Pelicula::find($id_pelicula);  

        $total_votos =  $pelicula->total_votos;  
        $suma_estrellas = $pelicula->suma_estrellas; 

        $total_votos = $total_votos + 1; 

        $suma_estrellas = $suma_estrellas + $estrellas;  

        $rating_calculado = $suma_estrellas / $total_votos;  

        $rating_calculado = round($rating_calculado, 1);

        $update = DB::table('peliculas')
                ->where('id', $id_pelicula)
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
        $generos = Genero::orderBy('genero','ASC')->where('tipo','=','pelicula')->lists('genero', 'id');   
        $actores = Actor::orderBy('nombre','ASC')->lists('nombre','id');
        $directores = Director::orderBy('nombre','ASC')->lists('nombre','id');

        return view('admin.peliculas.create')            
            ->with('generos',$generos)
            ->with('actores',$actores)
            ->with('directores',$directores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
               

        // manipulacion de imagenes
        if($request-> file('image')){  // si viene un archivo en el request llamado image
            $file = $request->file('image');
            $name = 'Scorpioncine_' . time() .'.' . $file->getClientOriginalExtension();
            $path = public_path() . '/img/peliculas/carteles/';
            $file->move($path, $name);
        }else{
            $name = 'niimage.jpg';
        }        

        $pelicula = new Pelicula($request->all());
        
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

        $pelicula->cast = $cadena;
        $pelicula->sinopsis = strip_tags($pelicula->sinopsis);  

        // FIN //
       
        $pelicula->save();
       
        $pelicula->generos()->sync($request->generos);
        $pelicula->actores()->sync($request->actores);
        $pelicula->directores()->sync($request->directores);

        $image = new Cartel();
        $image->name = $name;
        $image->pelicula()->associate($pelicula);  // llama a la funcion article() del modelo Image, y con asosociate, une con el campo que los une, o sea, el article_id
        $image->save();


        Flash::success('Se ha creado la pelicula ' . $pelicula->titulo_original .' de forma satisfactoria!');
        return redirect()->route('admin.peliculas.index');
        
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
        $pelicula = Pelicula::find($id); 
        $generos = Genero::orderBy('genero','DESC')->where('tipo','=','pelicula')->lists('genero','id');
        $actores = Actor::orderBy('nombre','ASC')->lists('nombre','id');


        $my_generos = $pelicula->generos->lists('id')->ToArray();
        $my_actors = $pelicula->actores->lists('id')->ToArray();

        return view('admin.peliculas.edit')            
            ->with('pelicula', $pelicula)
            ->with('generos', $generos)
            ->with('actores', $actores)
            ->with('my_generos', $my_generos)
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

        //dd($request->all());
        // manipulacion de imagenes
        if($request-> file('image')){  // si viene un archivo en el request llamado image
            $file = $request->file('image');
            $name = 'Scorpioncine_' . time() .'.' . $file->getClientOriginalExtension();   // NOMBRE DEL ARCHIVO QUE VIENE
            $path = public_path() . '/img/peliculas/carteles/';

            // captura el cartel
            $cartel = Cartel::where('pelicula_id', $id)
               ->orderBy('name', 'DESC')
               ->get();

            // pasa a un array el objeto cartel
            $image_array = $cartel->all();  // array

            // borra el archivo de la imagen previa
            foreach ($image_array as $valor) {
                $vari = $valor["name"];  
                $path2 = public_path() . '/img/peliculas/carteles/' . $vari;
                unlink($path2);
            }       
            // fin borrado imagen previa

            $update = DB::table('carteles')
                ->where('pelicula_id', $id)
                ->update(['name' => $name]);

            $file->move($path, $name);  // mueve la nueva imagen al path
        }



        $pelicula = Pelicula::find($id);  

        $pelicula->fill($request->all());

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

        $pelicula->cast = $cadena;


        $pelicula->save();        
        $pelicula->generos()->sync($request->generos);
        $pelicula->actores()->sync($request->actores);

        Flash::warning('Se ha editado la pelicula ' . $pelicula->titulo_original . ' de forma exitosa!');
        return redirect()->route('admin.peliculas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        $cartel = Cartel::where('pelicula_id', $id)
               ->orderBy('name', 'DESC')
               ->get();
        
        // se borran los registros relacionados de la tabla pivote primero, y luego se elimina la pelicula
        $deleted = DB::delete('delete from genero_pelicula WHERE pelicula_id = ?' , [$id]);
        $deleted2 = DB::delete('delete from actor_pelicula WHERE pelicula_id = ?' , [$id]);
        $deleted2 = DB::delete('delete from director_pelicula WHERE pelicula_id = ?' , [$id]);
        
        $image_array = $cartel->all();  // array

        // borra el archivo de la imagen
        foreach ($image_array as $valor) {
            $vari = $valor["name"];  // se le asigna el nuevo formato al array 
            $path = public_path() . '/img/peliculas/carteles/' . $vari;
            unlink($path);
        }         
               
        $pelicula->delete();

        Flash::error('Se ha borrado la pelicula ' . $pelicula->titulo_original . ' de forma exitosa!');
        return redirect()->route('admin.peliculas.index');
    }
}
