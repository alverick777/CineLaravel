<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Genero;
use Laracasts\Flash\Flash;
use DB;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::orderBy('id','DESC')->paginate(5);
        return view('admin.generos.index')->with('generos', $generos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.generos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genero = new Genero($request->all());
        $genero->save();

        Flash::success('El genero ' . $genero->genero . ' ha sido creado con exito!');
        return redirect()->route('admin.generos.index');
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
        $genero = Genero::find($id);
        return view('admin.generos.edit')->with('genero', $genero);
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
        $genero = Genero::find($id);
        $genero->fill($request->all());
        $genero->save();

        Flash::warning('El genero ' . $genero->genero . ' ha sido editado con exito!');
        return redirect()->route('admin.generos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genero::find($id);
        $deleted = DB::delete('delete from genero_pelicula WHERE genero_id = ?' , [$id]);
        $genero->delete();

        Flash::error('El genero ' . $genero->genero . ' ha sido eliminado con exito!');
        return redirect()->route('admin.generos.index');
    }
}
