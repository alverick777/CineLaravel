<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FilmografiaActor;
use Laracasts\Flash\Flash;

class FilmografiaActorController extends Controller
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

    public function load(Request $request)    
    {        
        if($request->ajax()){ 
            $filmografia = FilmografiaActor::orderBy('year_peli_o_serie','ASC')->where('actor_id','=',$request->id[0])->get();
                         
            return response()->json([
                "mensaje" => $filmografia->all()
            ]);        
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
        $filmografia = new FilmografiaActor($request->all());        
         
        
        $filmografia->actor()->associate($request->actor_id);   
        $filmografia->save();
     
        Flash::success('El registro ' . $filmografia->name_peli_o_serie . ' ha sido agregada con exito a la filmografia!');
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
    public function destroy(Request $request,$id)
    {
        if($request->ajax()){ 

        $filmografia = FilmografiaActor::find($id);        
        $filmografia->delete();

        return response()->json([
                "mensaje" => "bien!!!!"
            ]);        
        }
    }
}
