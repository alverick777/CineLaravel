<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FotosCapitulosSeries;
use App\Serie;
use App\Capitulo;

class ImagenesCapitulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

         $foto = new FotosCapitulosSeries($request->all());                  

         $num_fotito_portada = FotosCapitulosSeries::orderBy('id','ASC')->where('portadaYesNo','=','si')->where('capitulo_id','=',$foto->capitulo_id)->count();

        // manipulacion de imagenes
        if($request-> file('image')){ 
            $file = $request->file('image');
            if($request->portadaYesNo == 'si' && $num_fotito_portada == 0){
                $name = 'Scorpioncine_Foto_Portada_' . $request->capitulo_name .'_' . time() .'.' . $file->getClientOriginalExtension();
            }else{
                $name = 'Scorpioncine_Foto_' . $request->capitulo_name .'_' . time() .'.' . $file->getClientOriginalExtension();
            }

            $path = public_path() . '/img/capitulos/img/';
            $file->move($path, $name);
        }else{
            $name = 'niimage.jpg';
        }

        $foto->nombrefoto = $name;
         
        if($num_fotito_portada > 0){
            $foto->portadaYesNo = 'no';
        }else{

        }

        $totalfotos = FotosCapitulosSeries::orderBy('id','ASC')->where('capitulo_id','=',$foto->capitulo_id)->count();      
        if($totalfotos < 7){
           $foto->save();     
        }else{

        }

         
         $capitulos = Capitulo::orderBy('id','ASC')->where('serie_id', '=', $request->serie_id)->paginate(6); 
         $serie = Serie::find($request->serie_id);

         $nombre_serie = $serie->titulo_serie;
         $id_serie = $serie->id;        

         return view('admin.series.capitulos')
            ->with('nombre_serie',$nombre_serie)
            ->with('id_serie',$id_serie)
            ->with('capitulos', $capitulos);
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
        //
    }
}
