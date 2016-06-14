<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Avatar;
use Laracasts\Flash\Flash;
use Auth;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);   
        $total_usuarios = User::orderBy('id','DESC')->count();

        return view('admin.users.index')->with('users', $users)->with('total',$total_usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
      // vista del formulario de creacion de usuarios 
      return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {             

         // manipulacion de imagenes
        if($request-> file('image')){  // si viene un archivo en el request llamado image
            $file = $request->file('image');
            $name = 'Avatar_' . time() .'.' . $file->getClientOriginalExtension();
            $path = public_path() . '/img/avatars/';
            $file->move($path, $name);
        }

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->status = "Active";     
        $user->save(); 

        $avatar = new Avatar();
        $avatar->name = $name;
        $avatar->user()->associate($user);  // llama a la funcion article() del modelo Image, y con asosociate, une con el campo que los une, o sea, el article_id
        $avatar->save();

        Flash::success("Se ha registrado al " . $user->name . " de forma exitosa!");
        return redirect()->route('admin.users.index');
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
       $user = User::find($id);
       return view('admin.users.edit')->with('user', $user);
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
        $user = User::find($id);      
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tipo = $request->tipo;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->save();

        Flash::warning('El usuario ' . $user->name . ' ha sido editado con exito!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $deleted = DB::delete('delete from avatars WHERE user_id = ?' , [$id]);

        $user->delete();

        Flash::error('El usuario '. $user->name . ' se ha eliminado correctamente!');
        return redirect()->route('admin.users.index');
    }
}
