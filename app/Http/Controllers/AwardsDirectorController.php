<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AwardsDirector;
use Laracasts\Flash\Flash;

class AwardsDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
    }

    public function load(Request $request)
    {
        //dd($request->id[0]);
        if($request->ajax()){ 
            $awards = AwardsDirector::orderBy('id','DESC')->where('director_id','=',$request->id[0])->get();
            //dd($awards->all());                
            return response()->json([
                "mensaje" => $awards->all()
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
   
        $award = new AwardsDirector($request->all());        
        
        // el objeto award llama a su funcion de relacion director, y lo asocia con el id del director que viene en el request
        $award->director()->associate($request->id_director);   
        $award->save();        

        Flash::success('El premio ' . $award->nombre_premio . ' ha sido creado con exito!');
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
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){ 

        $award = AwardsDirector::find($id);        
        $award->delete();

        return response()->json([
                "mensaje" => $id
            ]);        
        }
    }




}
