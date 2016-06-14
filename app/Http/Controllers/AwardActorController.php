<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AwardsActor;
use Laracasts\Flash\Flash;

class AwardActorController extends Controller
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
        //dd($request->id[0]);
        if($request->ajax()){ 
            $awards = AwardsActor::orderBy('id','DESC')->where('actor_id','=',$request->id[0])->get();                           
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
        $award = new AwardsActor($request->all());
        
        $award->save();

        Flash::success('El premio ha sido agregado con exito al actor ' . $award->actor->nombre);
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
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){ 

        $award = AwardsActor::find($id);        
        $award->delete();

        return response()->json([
                "mensaje" => $id
            ]);        
        }
    }
}
