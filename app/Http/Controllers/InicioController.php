<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Marcas;
use App\Models\Producto;
use App\Models\SeccionInicio;
use App\Models\SectorServicio;
use App\Models\Servicio;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
    public function editarInicio(){
      
     
        $seccionEmpresa=SeccionInicio::find(1);
        $marcas=Marcas::orderby('orden',"ASC")->get();
        return view('admin.inicio.editarInicio',compact('seccionEmpresa','marcas'));
    }
    public function actualizarSeccionInicio(Request $request,$id){
        $seccionInicio=SeccionInicio::find($id);
        if($archivo=$request->file('iconoInicio')){
            $nombre="img_calidadInicio".".".$archivo->getClientOriginalExtension();
            $archivo->move('images/inicio',$nombre);
            $seccionInicio->imagen=$nombre;
        }
        if($archivo=$request->file('iconoInicioDos')){
            $nombre="img_calidadInicioDos".".".$archivo->getClientOriginalExtension();
            $archivo->move('images/inicio',$nombre);
            $seccionInicio->imagen_dos=$nombre;
        }
        
        $seccionInicio->update($request->all());
    }
    public function actualizarSeccionEmpresa(Request $request,$id){
        $seccionEmpresa=SeccionInicio::find($id);
        if($archivo=$request->file('imagenEmpresa')){
            $nombre="imgempresa_Inicio".".".$archivo->getClientOriginalExtension();
            $archivo->move('images/inicio',$nombre);
            $seccionEmpresa->imagen=$nombre;
        }
        if($seccionEmpresa->update($request->all())){
            return back()->with('success',"Contenido Actualizado");
        }else{
            return back()->with('error',"Algo salió mal");

        }
    }
    public function AgregarMarca(Request $request){
        $marca= new Marcas();
        $marca->orden=$request->orden;
        if($request->hasFile('img_marca')){
            $marca->imagen=$request->file('img_marca')->store('images/inicio');
        }
        $marca->save();
    }
    public function EditarMarca($id){
        $marca=Marcas::findorFail($id);
        return $marca;
    }
    public function ActualizarMarca(Request $request,$id){
        $marca=Marcas::findorFail($id);
        if($request->hasFile('img_marca_edit')){
            Storage::delete($marca->imagen);
            $marca->imagen=$request->file('img_marca_edit')->store('images/inicio');
        }
        $marca->update($request->all());
    }
    public function EliminarMarca($id){
        $marca=Marcas::findorFail($id);
        $marca->delete();
    }
    public function vistaInicio(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        // $sliders= Sliders::where('pagina','inicio')->orderby('orden',"ASC")->get();
        // $productos=Producto::orderby('orden',"ASC")->take(8)->get();
        // $servicios=Servicio::orderby('orden',"ASC")->get();
        // $sectores=SectorServicio::orderby('orden',"ASC")->get();
        // $seccionEmpresa=SeccionInicio::find(1);
        return view('layouts.plantilla',compact('contactos','iconoSup','iconoInf'));
        
    }
}
