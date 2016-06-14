<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Capitulo;
use App\Serie;
use App\FotosCapitulosSeries;
use Laracasts\Flash\Flash;
use DB;

class CapitulosSeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::orderBy('titulo_serie','ASC')->lists('titulo_serie','id');        

        $my_series = $series->toArray();        

        return view('admin.series.capitulos')
            ->with('series', $series)
            ->with('my_series',$my_series);     
    }

    public function loadCapitulos($id){        
        
        $capitulos = Capitulo::orderBy('id','ASC')->where('serie_id', '=', $id)->paginate(6);
        $serie = Serie::find($id);

        $nombre_serie = $serie->titulo_serie;
        $id_serie = $serie->id;        
        $cap_array = $capitulos->all();

        foreach ($cap_array as $key) {   
            $des_sintags = strip_tags($key->descripcion_capitulo);   
            $key->descripcion_capitulo = substr($des_sintags, 0, 150) . "...";         
        }   
       
        return view('admin.series.capitulos')
            ->with('nombre_serie',$nombre_serie)
            ->with('id_serie',$id_serie)
            ->with('capitulos', $capitulos);   
    }

    public function calc_Puntuacion(Request $request){
        
        $estrellas = $request->stars;  // tiene las estrellas de este voto
        $id_capi = $request->id_capitulo;  // tiene el id del capitulo

        $capitulo = Capitulo::find($id_capi);  // captura el capitulo completo

        $total_votos =  $capitulo->total_votos;  // tiene el total de votos actual   * 0 * 1 * 2
        $suma_estrellas = $capitulo->suma_estrellas; // tiene la suma de las estrellas * 0 * 5 * 10

        $total_votos = $total_votos + 1; // * 1 * 2 * 3 * 

        $suma_estrellas = $suma_estrellas + $estrellas;  // * 5 *  10 * 15 * 

        $rating_calculado = $suma_estrellas / $total_votos;  // 5 / 1 = 5 *** 10 / 2 = 5 *** 15 / 3 = 5 ***

        $rating_calculado = round($rating_calculado, 1);

        $update = DB::table('capitulos')
                ->where('id', $id_capi)
                ->update(['total_votos' => $total_votos, 'suma_estrellas' => $suma_estrellas,'rating' => $rating_calculado]);

        return response()->json([
                "rating" => $rating_calculado,
                "total_votos" => $total_votos
        ]);
    }

    public function capi_indiv($id){

        $capitulo = Capitulo::find($id);
        $serie = Serie::find($capitulo->serie_id);

        $nombre_serie = $serie->titulo_serie;
        $fecha_inicio = $serie->year_serie_inicio;
        $fecha_termino = $serie->year_serie_termino;
        $genero_view = "All Series";

        $tresultimos = FotosCapitulosSeries::orderBy('id','ASC')->where('capitulo_id', '=', $id)->where('portadaYesNo', '=','no')->skip(3)->take(3)->get();
        $tresprimeros = FotosCapitulosSeries::orderBy('id','ASC')->where('capitulo_id', '=', $id)->where('portadaYesNo', '=','no')->take(3)->get();
    
        return view('frontend.capitulo_indiv')
            ->with('genero_view',$genero_view)
            ->with('nombre_serie',$nombre_serie)
            ->with('fecha_inicio',$fecha_inicio)
            ->with('fecha_termino',$fecha_termino)
            ->with('capitulo',$capitulo)
            ->with('tresprimeros',$tresprimeros)
            ->with('tresultimos',$tresultimos);
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
       $capitulo = new Capitulo($request->all());

       $num_tem = $capitulo->temporada;
       for ($i=1; $i <= $num_tem; $i++) { 
           if($capitulo->temporada == 1 || $capitulo->temporada == 11 || $capitulo->temporada == 21 || $capitulo->temporada == 31){
                $capitulo->color_barra = "B51212";
           }       
           if($capitulo->temporada == 2 || $capitulo->temporada == 12 || $capitulo->temporada == 22 || $capitulo->temporada == 32){
                $capitulo->color_barra = "DF9020";
           }       
           if($capitulo->temporada == 3 || $capitulo->temporada == 13 || $capitulo->temporada == 23 || $capitulo->temporada == 33){
                $capitulo->color_barra = "2E37AA";
           }       
           if($capitulo->temporada == 4 || $capitulo->temporada == 14 || $capitulo->temporada == 24 || $capitulo->temporada == 34){
                $capitulo->color_barra = "6CBBB8";
           }       
           if($capitulo->temporada == 5 || $capitulo->temporada == 15 || $capitulo->temporada == 25 || $capitulo->temporada == 35){
                $capitulo->color_barra = "11802E";
           }       
           if($capitulo->temporada == 6 || $capitulo->temporada == 16 || $capitulo->temporada == 26 || $capitulo->temporada == 36){
                $capitulo->color_barra = "80117E";
           }       
           if($capitulo->temporada == 7 || $capitulo->temporada == 17 || $capitulo->temporada == 27 || $capitulo->temporada == 37){
                $capitulo->color_barra = "040404";
           }       
           if($capitulo->temporada == 8 || $capitulo->temporada == 18 || $capitulo->temporada == 28 || $capitulo->temporada == 38){
                $capitulo->color_barra = "827E82";
           }       
           if($capitulo->temporada == 9 || $capitulo->temporada == 19 || $capitulo->temporada == 29 || $capitulo->temporada == 39){
                $capitulo->color_barra = "C4CC21";
           }       
           if($capitulo->temporada == 10 || $capitulo->temporada == 20 || $capitulo->temporada == 30 || $capitulo->temporada == 40){
                $capitulo->color_barra = "2EAFEB";
           }      

       }
       
       $capitulo->rating = '0';
       $capitulo->save(); 

        $id_se = $capitulo->serie_id;

        Flash::success('Se ha Agregado el capitulo ' . $capitulo->nombre_capitulo .' de forma satisfactoria!');
        return redirect()->route('admin.capitulos.loadCapitulos', $id_se);          
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
        $capitulo = Capitulo::find($id);
        $capitulo->delete();        
        
        $id_se = $capitulo->serie_id;

        Flash::success('Se ha eliminado el capitulo ' . $capitulo->nombre_capitulo .' de forma satisfactoria!');
        return redirect()->route('admin.capitulos.loadCapitulos', $id_se);      

    }
}
