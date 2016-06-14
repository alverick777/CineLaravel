<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use DB;
use App\Director;
use Carbon\Carbon;
use App\FotoDirector;
use App\AwardsDirector;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $directores = Director::Searchdirector($request->nombre)->orderBy('id','DESC')->paginate(5);               
        $total_directores = Director::orderBy('id','DESC')->count();
        
        $dires = Director::orderBy('nombre','DESC')->lists('nombre','id'); 
        //dd($dires);       
        $directores_array = $directores->all();  // array
               
        $my_directores = $dires->toArray();
        //dd($my_directores);
         
        foreach ($directores_array as $valor) {
            $date = Carbon::createFromTimestamp(strtotime($valor["fecha_naci"]));   // se pasa la fecha de string a fecha tipo carbon  
            $date = $date->format('d-m-Y'); // la formatea a tipo (d-m-Y)
            $valor["fecha_naci"] = $date;  // se le asigna el nuevo formato al array 
        }

        /*$breadcrumbs = new \Creitive\Breadcrumbs\Breadcrumbs;
        $breadcrumbs->addCrumb('Home', '/');
        $breadcrumbs->setDivider('»');
        $breadcrumbs->addCrumb('Directores', 'http://localhost:8000/admin/directores');

        <div class="breadcrumbs">
        {!! $breadcrumbs->render() !!}
      </div>
      <br>
          */

          return view('admin.directores.index')
            ->with('directores',$directores)
            ->with('dires',$dires)
            ->with('total',$total_directores)            
            ->with('my_directores',$my_directores);        
    }


    public function indexFront(Request $request)
    {
        $directores = Director::SearchforWord($request->word)->orderBy('id','DESC')->paginate(10);      

        $directoresss = $directores->all();
        foreach ($directoresss as $key) {
            $biografia_sintags = strip_tags($key->biografia);            
            $key->biografia = substr($biografia_sintags, 0, 125) . "...";            
            $date = Carbon::createFromTimestamp(strtotime($key["fecha_naci"]));
            $key->fecha_naci = $date->format('l jS \\of F Y');
        }   
       
        $genero_view = "All Directors";

        return view('frontend.directores')
            ->with('directores',$directores)   
            ->with('genero_view',$genero_view);
    }

    public function individual($id){

        $director = Director::find($id);

        $director->biografia = strip_tags($director->biografia);    

        $date = Carbon::createFromTimestamp(strtotime($director->fecha_naci));
        $director->fecha_naci = $date->format('l jS \\of F Y');    
                
        $director_view = "All DIRECTORS";         

        $awards = AwardsDirector::groupBy('tipo')->where('director_id','=',$id)->get();   

        $total_won = AwardsDirector::where('director_id','=',$id)->where('resultado','=','won')->count();
        $total_nominated = AwardsDirector::where('director_id','=',$id)->where('resultado','=','nominated')->count();

        return view('frontend.directores_individual')
            ->with('director',$director)
            ->with('awards', $awards)
            ->with('total_won',$total_won)
            ->with('total_nominated',$total_nominated)            
            ->with('director_view',$director_view);
    }

    public function filterdirectorporletra($letra){
        $directores = Director::SearchFilterporLetra($letra)->orderBy('id','DESC')->paginate(10); 
        
        $directoress = $directores->all();
        foreach ($directoress as $key) {
            $biografia_sintags = strip_tags($key->biografia);            
            $key->biografia = substr($biografia_sintags, 0, 125) . "...";            
            $date = Carbon::createFromTimestamp(strtotime($key["fecha_naci"]));
            $key->fecha_naci = $date->format('l jS \\of F Y');
        }         
           
        $genero_view = $letra;        

        return view('frontend.directores')
            ->with('directores',$directores)
            ->with('genero_view',$genero_view);
    }


    public function filterSexoDirector($sexo){        
        $directores = Director::SearchFilterporSexo($sexo)->orderBy('id','DESC')->paginate(10);

        $directoress = $directores->all();
        foreach ($directoress as $key) {
            $biografia_sintags = strip_tags($key->biografia);            
            $key->biografia = substr($biografia_sintags, 0, 125) . "...";            
            $date = Carbon::createFromTimestamp(strtotime($key["fecha_naci"]));
            $key->fecha_naci = $date->format('l jS \\of F Y');
        }   

        if($sexo == 'F'){
            $genero_view = "Female";
        }else{
            $genero_view = "Male";
        }

        return view('frontend.directores')
            ->with('directores',$directores)
            ->with('genero_view',$genero_view);
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
            $director = new Director($request->all());  

            // manipulacion de imagenes
            if($request-> file('image')){  // si viene un archivo en el request llamado image
                $file = $request->file('image');
                $name = 'Scorpioncine_Director_' . time() . '_' . $director->nombre .'.'. $file->getClientOriginalExtension();
                $path = public_path() . '/img/directores/fotos/';
                $file->move($path, $name);
            }else{
                $name = 'niimage.jpg';
            }  

             
             $director->fecha_naci = str_replace("/", "-", $director->fecha_naci);  // saca los slash y los transforma en guiones para mysql
             $val = $director->fecha_naci;                         
             $date = Carbon::createFromTimestamp(strtotime($val)); // transforma la fecha ingresada a formato mysql
                      
             $director->fecha_naci = $date;
             $director->save();

            $image = new FotoDirector();
            $image->name_foto = $name;
            $image->director()->associate($director);  
            $image->save();
         
            Flash::success('Se ha creado el director '. $director->nombre .' de forma satisfactoria!');
            return redirect()->route('admin.directores.index');
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
        $directores = Director::find($id); 
        
        $date = Carbon::createFromTimestamp(strtotime($directores->fecha_naci));   // se pasa la fecha de string a fecha tipo carbon  
        $date = $date->format('Y-m-d'); // la formatea a tipo (d-m-Y)
        $directores->fecha_naci = $date;  // se le asigna el nuevo formato al array 
                

        return view('admin.directores.edit')  
            ->with('directores', $directores);
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
        $director = Director::find($id);  
          // manipulacion de imagenes
        if($request-> file('image')){  // si viene un archivo en el request llamado image
            $file = $request->file('image');
            $name = 'Scorpioncine_actor_' . time() . '_' . $director->nombre .'.'. $file->getClientOriginalExtension();
            $path = public_path() . '/img/directores/fotos/';

            // captura el cartel
            $foto = FotoDirector::where('director_id', $id)
               ->orderBy('name_foto', 'DESC')
               ->get();

            // pasa a un array el objeto foto
            $image_array = $foto->all();  // array

            // borra el archivo de la imagen previa
            foreach ($image_array as $valor) {
                $vari = $valor["name_foto"];  
                $path2 = public_path() . '/img/directores/fotos/' . $vari;
                unlink($path2);
            }       
            // fin borrado imagen previa

            $update = DB::table('fotos_directores')
                ->where('director_id', $id)
                ->update(['name_foto' => $name]);

            $file->move($path, $name);  // mueve la nueva imagen al path
        }

             $director->fecha_naci = str_replace("/", "-", $director->fecha_naci);  // saca los slash y los transforma en guiones para mysql
             $val = $director->fecha_naci;                         
             $date = Carbon::createFromTimestamp(strtotime($val)); // transforma la fecha ingresada a formato mysql
                      
             $director->fecha_naci = $date;

        $director->fill($request->all());
        $director->save();                

        Flash::warning('Se ha editado el director ' . $director->nombre . ' de forma exitosa!');
        return redirect()->route('admin.directores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       $director = Director::find($id);
       $foto = FotoDirector::where('director_id', $id)
               ->orderBy('name_foto', 'DESC')
               ->get();

        $image_array = $foto->all();  // array

        // borra el archivo de la imagen
        foreach ($image_array as $valor) {
            $vari = $valor["name_foto"];  // se le asigna el nuevo formato al array 
            $path = public_path() . '/img/directores/fotos/' . $vari;
            unlink($path);
        } 
        
        $deleted = DB::delete('delete from fotos_directores WHERE director_id = ?' , [$id]);   
       
               
        $director->delete();

        Flash::error('Se ha borrado el director ' . $director->nombre . ' de forma exitosa!');
        return redirect()->route('admin.directores.index');
    }
}
