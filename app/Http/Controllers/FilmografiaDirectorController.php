<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FilografiaDirector;
use Laracasts\Flash\Flash;

class FilmografiaDirectorController extends Controller
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
            $filmografia = FilografiaDirector::orderBy('year_pelicula','ASC')->where('director_id','=',$request->id[0])->get();
                         
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
       
        $filmografia = new FilografiaDirector($request->all());        
        
        // el objeto award llama a su funcion de relacion director, y lo asocia con el id del director que viene en el request
        $filmografia->director()->associate($request->id_director);   
        $filmografia->save();
     
        Flash::success('La pelicula ' . $filmografia->nombre_pelicula . ' ha sido agregada con exito a la filmografia!');
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

        $filmografia = FilografiaDirector::find($id);        
        $filmografia->delete();

        return response()->json([
                "mensaje" => $id
            ]);        
        }
    }



}
