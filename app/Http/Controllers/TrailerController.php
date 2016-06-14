<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelicula;
use App\Trailer;


class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $trailers = Trailer::orderBy('id','DESC')->get();
       foreach ($trailers as $key) {
           if(strlen($key->name_peli) > 20){                
                $key->name_peli = substr($key->name_peli, 0, 20) . "...";
           }else{
           }
       }    

       return view('frontend.trailer')
        ->with('trailers',$trailers);
    }

    public function download($id){

        $trailer = Trailer::find($id);        

        $file = public_path() . '/trailers/' . $trailer->name_trailer;


        if(!$file){ // file does not exist
            die('file not found');
        } else {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$trailer->name_trailer");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");

            // read the file from disk
            readfile($file);
        }
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

        // manipulacion de video
        if($request-> file('trailer')){  // si viene un archivo en el request llamado trailer
            $file = $request->file('trailer');
            $name = 'Scorpioncine_trailer_' . time() .'.' . $file->getClientOriginalExtension();
            $path = public_path() . '/trailers/';
            $file->move($path, $name);
        }else{
            $name = 'novideo.png';
        }

        $pelicula = Pelicula::find($request->pelicula_id);        

        $trailer = new Trailer();
        $trailer->name_trailer = $name;
        $trailer->idioma = $request->idioma;
        $trailer->pelicula()->associate($pelicula);  // llama a la funcion article() del modelo Image, y con asosociate, une con el campo que los une, o sea, el article_id
        $trailer->name_peli = $pelicula->titulo_original;
        $trailer->save();

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
