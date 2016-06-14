<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NoticiaActor;
use Laracasts\Flash\Flash;

class NoticiasActoresController extends Controller
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

        $noticias = NoticiaActor::orderBy('id','DESC')->paginate(10);  

        $notis = $noticias->all();
        foreach ($notis as $key) {                        
            $key->descripcion = substr($key->descripcion, 0, 200) . "...";
        }         

        return view('frontend.noticias_actores')
          ->with('noticias',$noticias);
    }

    public function noticia_actor_individual($id){

            $noticia = NoticiaActor::find($id);

            return view('frontend.noticia_actor_individual')
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
            $noticia_actor = new NoticiaActor($request->all());  
            
            // manipulacion de imagenes
            if($request-> file('image')){  // si viene un archivo en el request llamado image
                $file = $request->file('image');
                $name = 'Scorpioncine_noticia_actor_' . time() .'.'. $file->getClientOriginalExtension();
                $path = public_path() . '/img/noticias_actores/';
                $file->move($path, $name);
            }else{
                $name = 'niimage.jpg';
            }  

            $noticia_actor->foto = $name;
            $noticia_actor->actor_id = $request->actores[0];

            $noticia_actor->save();

            Flash::success('Se ha creado la noticia de forma satisfactoria!');
            return redirect()->route('admin.noticias.noticias_actores');
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
        $noticia = NoticiaActor::find($id);
        
        $noticia->delete();

        Flash::error('Se ha borrado la noticia ' . $noticia->titulo . ' con exito!');
        return redirect()->route('admin.noticias.noticias_actores');
    }
}
