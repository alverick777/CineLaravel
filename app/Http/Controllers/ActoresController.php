<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Actor;
use Laracasts\Flash\Flash;
use DB;
use Carbon\Carbon;
use App\FotoActor;
use App\AwardsActor;


class ActoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index(Request $request)
    {   
        $actores = Actor::Searchactor($request->nombre)->orderBy('id','DESC')->paginate(5);
        $total_actores = Actor::orderBy('id','DESC')->count();

        $actores2 = Actor::orderBy('nombre','DESC')->lists('nombre','id');

        $actores_array = $actores->all();  // array

        $my_actores = $actores2->toArray();

        foreach ($actores_array as $valor) {
            $date = Carbon::createFromTimestamp(strtotime($valor["fecha_nac"]));   // se pasa la fecha de string a fecha tipo carbon  
            $date = $date->format('d-m-Y'); // la formatea a tipo (d-m-Y)
            $valor["fecha_nac"] = $date;  // se le asigna el nuevo formato al array 
        }
           
          return view('admin.actores.index')
                ->with('actores',$actores)
                ->with('total',$total_actores)
                ->with('my_actores',$my_actores)
                ->with('actores2',$actores2);
    }

    public function indexFront(Request $request)
    {
        $actores = Actor::SearchforWord($request->word)->orderBy('id','DESC')->paginate(10);      

        $actoresss = $actores->all();
        foreach ($actoresss as $key) {
            $biografia_sintags = strip_tags($key->biografia);            
            $key->biografia = substr($biografia_sintags, 0, 125) . "...";            
            $date = Carbon::createFromTimestamp(strtotime($key["fecha_nac"]));
            $key->fecha_nac = $date->format('l jS \\of F Y');
        }   
       
        $genero_view = "All Actors";

        return view('frontend.actores')
            ->with('actores',$actores)   
            ->with('genero_view',$genero_view);
    }

    public function individual($id){

        $actor = Actor::find($id);

        $actor->biografia = strip_tags($actor->biografia);    

        $date = Carbon::createFromTimestamp(strtotime($actor->fecha_nac));
        $actor->fecha_nac = $date->format('l jS \\of F Y');    
                
        $actor_view = "All ACTORS";         

        $awards = AwardsActor::groupBy('tipo')->where('actor_id','=',$id)->get();   

        $total_won = AwardsActor::where('actor_id','=',$id)->where('resultado','=','won')->count();
        $total_nominated = AwardsActor::where('actor_id','=',$id)->where('resultado','=','nominated')->count();

        return view('frontend.actores_individual')
            ->with('actor',$actor)
            ->with('awards', $awards)
            ->with('total_won',$total_won)
            ->with('total_nominated',$total_nominated)            
            ->with('actor_view',$actor_view);
    }

    public function actorespendientes(){
        $actores_pen = Actor::orderBy('id','DESC')->where('status_datos', '=', 'no')->paginate(10);       
        
        return view('admin.actores.actores_pendientes')
            ->with('actores',$actores_pen);
    }

    public function filteractoresporletra($letra){
        $actores = Actor::SearchFilterporLetra($letra)->orderBy('id','DESC')->paginate(10); 
        
        $actoresss = $actores->all();
        foreach ($actoresss as $key) {
            $biografia_sintags = strip_tags($key->biografia);            
            $key->biografia = substr($biografia_sintags, 0, 125) . "...";            
            $date = Carbon::createFromTimestamp(strtotime($key["fecha_nac"]));
            $key->fecha_nac = $date->format('l jS \\of F Y');
        }         
           
        $genero_view = $letra;        

        return view('frontend.actores')
            ->with('actores',$actores)
            ->with('genero_view',$genero_view);
    }

    public function filterSexo($sexo){        
        $actores = Actor::SearchFilterporSexo($sexo)->orderBy('id','DESC')->paginate(10);

        $actoresss = $actores->all();
        foreach ($actoresss as $key) {
            $biografia_sintags = strip_tags($key->biografia);            
            $key->biografia = substr($biografia_sintags, 0, 125) . "...";            
            $date = Carbon::createFromTimestamp(strtotime($key["fecha_nac"]));
            $key->fecha_nac = $date->format('l jS \\of F Y');

        }   

        if($sexo == 'F'){
            $genero_view = "Actress";
        }else{
            $genero_view = "Actors";
        }

        return view('frontend.actores')
            ->with('actores',$actores)
            ->with('genero_view',$genero_view);
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
        
            $actor = new Actor($request->all());  

            // manipulacion de imagenes
            if($request-> file('image')){  // si viene un archivo en el request llamado image
                $file = $request->file('image');
                $name = 'Scorpioncine_actor_' . time() . '_' . $actor->nombre .'.'. $file->getClientOriginalExtension();
                $path = public_path() . '/img/actores/fotos/';
                $file->move($path, $name);
            }else{
                $name = 'niimage.jpg';
            }  

             
             $actor->fecha_nac = str_replace("/", "-", $actor->fecha_nac);  // saca los slash y los transforma en guiones para mysql
             $val = $actor->fecha_nac;                         
             $date = Carbon::createFromTimestamp(strtotime($val)); // transforma la fecha ingresada a formato mysql
                      
             $actor->fecha_nac = $date;
             $actor->save();

            $image = new FotoActor();
            $image->name_foto = $name;
            $image->actor()->associate($actor);  
            $image->save();
         
            Flash::success('Se ha creado el actor '. $actor->nombre .' de forma satisfactoria!');
            return redirect()->route('admin.actores.index');
      
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
        $actores = Actor::find($id); 
        
        $date = Carbon::createFromTimestamp(strtotime($actores->fecha_nac));   // se pasa la fecha de string a fecha tipo carbon  
        $date = $date->format('d-m-Y'); // la formatea a tipo (d-m-Y)
        $actores->fecha_nac = $date;  // se le asigna el nuevo formato al array 
                

        return view('admin.actores.edit')  
            ->with('actores', $actores);
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
       $actor = Actor::find($id);  
          // manipulacion de imagenes
        if($request-> file('image')){  // si viene un archivo en el request llamado image
            $file = $request->file('image');
            $name = 'Scorpioncine_actor_' . time() . '_' . $actor->nombre .'.'. $file->getClientOriginalExtension();
            $path = public_path() . '/img/actores/fotos/';

            // captura el cartel
            $foto = FotoActor::where('actor_id', $id)
               ->orderBy('name_foto', 'DESC')
               ->get();

            // pasa a un array el objeto foto
            $image_array = $foto->all();  // array

            // borra el archivo de la imagen previa
            foreach ($image_array as $valor) {
                $vari = $valor["name_foto"];  
                $path2 = public_path() . '/img/actores/fotos/' . $vari;
                unlink($path2);
            }       
            // fin borrado imagen previa

            $update = DB::table('fotos_actores')
                ->where('actor_id', $id)
                ->update(['name_foto' => $name]);

            $file->move($path, $name);  // mueve la nueva imagen al path
        }


        $actor->fill($request->all());

        $actor->fecha_nac = str_replace("/", "-", $actor->fecha_nac);  // saca los slash y los transforma en guiones para mysql
        $val = $actor->fecha_nac;                         
        $date = Carbon::createFromTimestamp(strtotime($val)); // transforma la fecha ingresada a formato mysql
                      
        $actor->fecha_nac = $date;

        $actor->save();                

        Flash::warning('Se ha editado el actor ' . $actor->nombre . ' de forma exitosa!');
        return redirect()->route('admin.actores.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $actor = Actor::find($id);
       $foto = FotoActor::where('actor_id', $id)
               ->orderBy('name_foto', 'DESC')
               ->get();

        $image_array = $foto->all();  // array

        // borra el archivo de la imagen
        foreach ($image_array as $valor) {
            $vari = $valor["name_foto"];  // se le asigna el nuevo formato al array 
            $path = public_path() . '/img/actores/fotos/' . $vari;
            unlink($path);
        } 

        $deleted = DB::delete('delete from actor_pelicula WHERE actor_id = ?' , [$id]);
        $deleted = DB::delete('delete from fotos_actores WHERE actor_id = ?' , [$id]);   
        $deleted = DB::delete('delete from actor_serie WHERE actor_id = ?' , [$id]);
               
        $actor->delete();

        Flash::error('Se ha borrado el actor ' . $actor->nombre . ' de forma exitosa!');
        return redirect()->route('admin.actores.index');
    }

  
    
}
