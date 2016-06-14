<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NoticiasPrincipal;
use App\Pelicula;
use App\NoticiaSerie;
use App\NoticiaActor;
use App\Serie;
use App\Actor;
use Laracasts\Flash\Flash;


class NoticiasPrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('admin.noticias.index');

    }

    public function frontNoticias(){

        $noticias = NoticiasPrincipal::orderBy('id','DESC')->paginate(10);  

        $notis = $noticias->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        }         

        return view('frontend.noticias_peliculas')
          ->with('noticias',$noticias);
    }

    public function noticia_pelicula_individual($id){

            $noticia = NoticiasPrincipal::find($id);

            return view('frontend.noticia_pelicula_individual')
                ->with('noticia',$noticia);

    }

    public function noticias_peliculas(){

        // NOTICIAS DE PELICULAS
        $noticias = NoticiasPrincipal::orderBy('id','DESC')->paginate(4);   

        $peliculas = Pelicula::orderBy('id','DESC')->get();
        $pelis2 = Pelicula::orderBy('titulo_original','DESC')->lists('titulo_original','id');

        $peliculas_array = $peliculas->all();  // array

        $my_films = $pelis2->toArray();

        $notis = $noticias->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        }         

        // FIN DE NOTICIAS PELICULAS        

         return view('admin.noticias.noticias_peliculas')
            ->with('noticias',$noticias)            
            ->with('peliculas',$peliculas)
            ->with('my_films',$my_films)
            ->with('pelis2',$pelis2);
    }


    public function noticias_series(){

        // NOTICIAS DE PELICULAS
        $noticias = NoticiaSerie::orderBy('id','DESC')->paginate(4);   

        $series = Serie::orderBy('id','DESC')->get();
        $series2 = Serie::orderBy('titulo_serie','DESC')->lists('titulo_serie','id');

        $series_array = $series->all();  // array

        $my_series = $series2->toArray();

        $notis = $noticias->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        }  

        // FIN DE NOTICIAS PELICULAS        

         return view('admin.noticias.noticias_series')
            ->with('noticias',$noticias)            
            ->with('series',$series)
            ->with('my_series',$my_series)
            ->with('series2',$series2);
    }

    public function noticias_actores(){

        // NOTICIAS DE PELICULAS
        $noticias = NoticiaActor::orderBy('id','DESC')->paginate(4);   

        $actores = Actor::orderBy('id','DESC')->get();
        $actores2 = Actor::orderBy('nombre','DESC')->lists('nombre','id');

        $actores_array = $actores->all();  // array

        $my_actores = $actores2->toArray();

        $notis = $noticias->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        }  

        // FIN DE NOTICIAS PELICULAS        

         return view('admin.noticias.noticias_actores')
            ->with('noticias',$noticias)            
            ->with('actores',$actores)
            ->with('my_actores',$my_actores)
            ->with('actores2',$actores2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $noticia = new NoticiasPrincipal($request->all());  
            
            // manipulacion de imagenes
            if($request-> file('image')){  // si viene un archivo en el request llamado image
                $file = $request->file('image');
                $name = 'Scorpioncine_noticia_' . time() .'.'. $file->getClientOriginalExtension();
                $path = public_path() . '/img/noticias_peliculas/';
                $file->move($path, $name);
            }else{
                $name = 'niimage.jpg';
            }  

            $noticia->foto = $name;
            $noticia->pelicula_id = $request->peliculas[0];

            $noticia->save();

            Flash::success('Se ha creado la noticia de forma satisfactoria!');
            return redirect()->route('admin.noticias.noticias_peliculas');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = NoticiasPrincipal::find($id);
        
        $noticia->delete();

        Flash::error('Se ha borrado la noticia ' . $noticia->titulo . ' con exito!');
        return redirect()->route('admin.noticias.noticias_peliculas');

    }
}
