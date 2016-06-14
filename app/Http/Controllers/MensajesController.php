<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Mensaje;
use Carbon\Carbon;
use App\User;
use DB;

class MensajesController extends Controller
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
        if($request->ajax()){
            
            $mensaje = new Mensaje($request->all());
            $mensaje->save();

            return response()->json([
                "mensaje" => "bien!!!!"
            ]);        
        }
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

    public function revisa_mensajes(){
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $mensajes = Mensaje::orderBy('id','DESC')->where('leido', '=', '0')->Where('user_id', '=', $user_id)->count();
        }else{
            $mensajes = "";
        }

        return response()->json([
                "mensaje" => $mensajes               
        ]);  

    }

    public function retorna_mensajes(){
         if(Auth::user()){
            $user_id = Auth::user()->id;             

            $mensajes2 = Mensaje::orderBy('id','DESC')->where('leido', '=', '0')->Where('user_id', '=', $user_id)->lists('mensaje');
            $fecha = Mensaje::orderBy('id','DESC')->where('leido', '=', '0')->Where('user_id', '=', $user_id)->lists("created_at");
            $name = Mensaje::orderBy('id','DESC')->where('leido', '=', '0')->Where('user_id', '=', $user_id)->lists("user_sender");
            $ids_mensajes = Mensaje::orderBy('id','DESC')->where('leido', '=', '0')->Where('user_id', '=', $user_id)->lists("id");
            
            
            /* ////////////// AVATARS DE CADA USUARIO ///////////////////////////////////*/

            $len_array_avatar = sizeof($name);

            $array_avatars[]=array();
            $array_nombres[]=array();

            for ($z=0; $z < $len_array_avatar; $z++) { 
                $avatars = DB::table('avatars')->where('user_id', $name[$z])->value('name');
                $nombres = DB::table('users')->where('id', $name[$z])->value('name');
                

                $array_avatars[$z] = $avatars;
                $array_nombres[$z] = $nombres;
            }
            
            /* //////////////////////////////// fin avatars ////////////////////////////////*/

            /* ////////////// Fechas ////////////////////////////////////////////////////// */    

            $array_fechas = $fecha->toArray();            
            $len_array = sizeof($array_fechas);

            $data[]=array();

            for ($i=0; $i < $len_array; $i++) { 
                $date = Carbon::createFromTimestamp(strtotime($array_fechas[$i])); 
                $valor = $date->diffForHumans();                
                $data[$i] = $valor;     
            }   

            /* /////////////////////// fin fechas ///////////////////////////////////////// */

        }else{
            $mensajes2 = "";
            $fecha = "";
        }
           
        return response()->json([
                "mensajes" => $mensajes2->toArray(),
                "nombres" => $array_nombres,
                "fechas" => $data,
                "avatars" => $array_avatars,
                "ids" => $ids_mensajes
        ]);  
    }


    public function marcar_leido(Request $request){        
       
        $id_mensaje = $request->id_mensaje;

        DB::table('mensajes')            
            ->where('id',$id_mensaje)
            ->update(['leido' => 1]);

        return response()->json([
            "mensajes" => "mensaje marcado como leido"                           
        ]);          
    }


}
