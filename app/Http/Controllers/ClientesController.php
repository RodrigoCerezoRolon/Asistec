<?php

namespace App\Http\Controllers;

use App\Models\CasoExito;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Metadato;
use App\Models\Sector;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    public function editarClientes(){
        $clientes=Cliente::orderby('orden',"ASC")->get();
        $casos=CasoExito::orderby('orden',"ASC")->get();
        $sectores=Sector::where('tipo',2)->orderby('orden',"ASC")->get();
        $sectoresEmpresa=Sector::where('tipo',1)->orderby('orden',"ASC")->get();
        return view('admin.clientes.editarClientes',compact('clientes','casos','sectores','sectoresEmpresa'));
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
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $clientes=Cliente::orderby('orden',"ASC")->get();
        $sectores=Sector::where('tipo',2)->orderby('orden',"ASC")->get();
        $sectoresEmpresa=Sector::where('tipo',1)->orderby('orden',"ASC")->get();
       // $metadato=Metadato::where('seccion',"clientes")->first()->get();
        return view('clientes',compact('contactos','iconoSup','clientes','sectores','sectoresEmpresa'));
    }
    public function filtrarClientes(Request $request){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $sectores=Sector::where('tipo',2)->orderby('orden',"ASC")->get();
        $sectoresEmpresa=Sector::where('tipo',1)->orderby('orden',"ASC")->get();
        if($request->sector!=null && $request->tipo!=null){
            $clientes=Cliente::where('sector_id',$request->sector)->where('tipo_empresa_id',$request->tipo)->orderby('orden',"ASC")->get();
        }
        if($request->sector!=null && $request->tipo==null){
            $clientes=Cliente::where('sector_id',$request->sector)->orderby('orden',"ASC")->get();
        }
        if($request->sector==null && $request->tipo!=null){
            $clientes=Cliente::where('tipo_empresa_id',$request->tipo)->orderby('orden',"ASC")->get();
        }
        return view('clientes',compact('contactos','iconoSup','clientes','sectores','sectoresEmpresa'));    
    }
}
