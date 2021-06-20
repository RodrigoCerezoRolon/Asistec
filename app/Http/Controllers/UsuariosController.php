<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usuarios.crearusuario');
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
        $this->validate($request,[
            'username' => ['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'role' => ['required']
        ],$messages=[
            'username.required'=>"El nombre de usuario es requerido",
            'username.max'=>"Maximo de 15 caracteres",
            'password.required'=>"La contraseña es requerida",
            'password.min'=>"El minino de caracteres es 5",
            'role.required'=>"El rol es requerido"
        ]);
        $usuario= new User();
        $usuario->username=$request->username;
        $usuario->password=Hash::make($request->password);
        $usuario->role_id= $request->role;
        if($usuario->save()){
            return back()->with('msj',"El usuario se dio de alta");
        }else{
            return back()->with('error',"El usuario no se registro");
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
        $usuario=User::findorFail($id);
        return $usuario;
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
        $usuario=User::findorFail($id);
       // $request->password=Hash::make($request->password);
    //    $usuario->username=$request->username;
       $usuario->role_id=$request['role_id'];
      // $usuario->password=bcrypt($request->password);
      $request['password']=bcrypt($request->password);
       $usuario->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=User::findorFail($id);
        $usuario->delete();
    }
    public function verUsuarios(){
        $usuarios= User::all();
        return view('admin.usuarios.verusuarios',compact('usuarios'));
    }
}
