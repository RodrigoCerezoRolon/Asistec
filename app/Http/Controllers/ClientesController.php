<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Metadato;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    public function editarClientes(){
        $clientes=Cliente::orderby('orden',"ASC")->get();
        return view('admin.clientes.editarClientes',compact('clientes'));
    }
    public function agregarCliente(Request $request){
        $cliente= new Cliente($request->all());
        if($request->has('imagen')){
            $cliente->imagen=$request->file('imagen')->store('images/clientes');
        }
        $cliente->save();
    }
    public function editarCliente($id){
        $cliente=Cliente::findorFail($id);
        return $cliente;
    }
    public function actualizarCliente(Request $request,$id){
        $cliente=Cliente::findorFail($id);
        if($request->has('imagenedit')){
            Storage::delete($cliente->imagen);
            $cliente->imagen=$request->file('imagenedit')->store('images/clientes');
        }
        $cliente->update($request->all());
    }
    public function eliminarCliente($id){
        $cliente=Cliente::findorFail($id);
        $cliente->delete();
    }
    public function vistaClientes(){
        $categorias=Categoria::orderby('orden',"ASC")->get();
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $clientes=Cliente::orderby('orden',"ASC")->get();
        $metadato=Metadato::where('seccion',"clientes")->first()->get();
        return view('clientes',compact('contactos','iconoSup','iconoInf','clientes','metadato','categorias'));
    }
}
