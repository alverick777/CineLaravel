<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NoticiaSerie;
use Laracasts\Flash\Flash;

class NoticiasSeriesController extends Controller
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

    public function frontNoticias(){

        $noticias = NoticiaSerie::orderBy('id','DESC')->paginate(10);  

        $notis = $noticias->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        }         

        return view('frontend.noticias_series')
          ->with('noticias',$noticias);
    }

    public function noticia_serie_individual($id){

            $noticia = NoticiaSerie::find($id);

            return view('frontend.noticia_serie_individual')
                ->with('noticia',$noticia);

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
         $noticia = new NoticiaSerie($request->all());  
            
            // manipulacion de imagenes
            if($request-> file('image')){  // si viene un archivo en el request llamado image
                $file = $request->file('image');
                $name = 'Scorpioncine_noticia_' . time() .'.'. $file->getClientOriginalExtension();
                $path = public_path() . '/img/noticias_series/';
                $file->move($path, $name);
            }else{
                $name = 'niimage.jpg';
            }  

            $noticia->foto = $name;
            $noticia->serie_id = $request->series[0];

            $noticia->save();

            Flash::success('Se ha creado la noticia de forma satisfactoria!');
            return redirect()->route('admin.noticias.noticias_series');
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
       $noticia = NoticiaSerie::find($id);
        
        $noticia->delete();

        Flash::error('Se ha borrado la noticia ' . $noticia->titulo . ' con exito!');
        return redirect()->route('admin.noticias.noticias_series');
    }
}
