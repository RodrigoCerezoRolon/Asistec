<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Marcas;
use App\Models\Producto;
use App\Models\SeccionInicio;
use App\Models\SectorServicio;
use App\Models\Servicio;
use App\Models\Sliders;
use App\Models\SubCategoria;
use App\Models\SubSubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
    public function editarInicio(){
      
     
        $seccionEmpresa=SeccionInicio::find(1);
        $seccionEmpresa->titulo_en=$seccionEmpresa->obtenerTraduccion('seccion_inicios','titulo',$seccionEmpresa->id,'en');
        $seccionEmpresa->titulo_it=$seccionEmpresa->obtenerTraduccion('seccion_inicios','titulo',$seccionEmpresa->id,'it');
        $seccionEmpresa->texto_en=$seccionEmpresa->obtenerTraduccion('seccion_inicios','texto',$seccionEmpresa->id,'en');
        $seccionEmpresa->texto_it=$seccionEmpresa->obtenerTraduccion('seccion_inicios','texto',$seccionEmpresa->id,'it');
        $seccionSolucion=SeccionInicio::find(2);
        $seccionSolucion->titulo_en=$seccionEmpresa->obtenerTraduccion('seccion_inicios','titulo',$seccionSolucion->id,'en');
        $seccionSolucion->titulo_it=$seccionEmpresa->obtenerTraduccion('seccion_inicios','titulo',$seccionSolucion->id,'it');
        $seccionSolucion->texto_en=$seccionEmpresa->obtenerTraduccion('seccion_inicios','texto',$seccionSolucion->id,'en');
        $seccionSolucion->texto_it=$seccionEmpresa->obtenerTraduccion('seccion_inicios','texto',$seccionSolucion->id,'it');
        $seccionMantenimiento=SeccionInicio::find(3);
        $seccionMantenimiento->titulo_en=$seccionEmpresa->obtenerTraduccion('seccion_inicios','titulo',$seccionMantenimiento->id,'en');
        $seccionMantenimiento->titulo_it=$seccionEmpresa->obtenerTraduccion('seccion_inicios','titulo',$seccionMantenimiento->id,'it');
        $seccionMantenimiento->texto_en=$seccionEmpresa->obtenerTraduccion('seccion_inicios','texto',$seccionMantenimiento->id,'en');
        $seccionMantenimiento->texto_it=$seccionEmpresa->obtenerTraduccion('seccion_inicios','texto',$seccionMantenimiento->id,'it');
        $marcas=Marcas::orderby('orden',"ASC")->get();
        return view('admin.inicio.editarInicio',compact('seccionEmpresa','marcas','seccionSolucion','seccionMantenimiento'));
    }
    public function actualizarSeccionEmpresa(Request $request,$id){
        $seccionEmpresa=SeccionInicio::find($id);
            if($id==1){
                if($request->file('imagenEmpresa')){
                    $seccionEmpresa->imagen=$request->file('imagenEmpresa')->store('images/inicio');
                }
            }
             if($id==2)   {
                if($request->file('imagenSolucion')){
                    $seccionEmpresa->imagen=$request->file('imagenSolucion')->store('images/inicio');
                }
            }
            if($id==3)   {
                if($request->file('imagenMantenimiento')){
                    $seccionEmpresa->imagen=$request->file('imagenMantenimiento')->store('images/inicio');
                }
            }
        $seccionEmpresa->actualizarTraduccion('seccion_inicios','titulo',$seccionEmpresa->id,$request->titulo_en,'en');
        $seccionEmpresa->actualizarTraduccion('seccion_inicios','titulo',$seccionEmpresa->id,$request->titulo_it,'it');
        $seccionEmpresa->actualizarTraduccion('seccion_inicios','texto',$seccionEmpresa->id,$request->texto_en,'en');
        $seccionEmpresa->actualizarTraduccion('seccion_inicios','texto',$seccionEmpresa->id,$request->texto_it,'it');
        if($seccionEmpresa->update($request->all())){
            return back()->with('success',"Contenido Actualizado");
        }else{
            return back()->with('error',"Algo sali?? mal");

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
        $sliders= Sliders::where('pagina','inicio')->orderby('orden',"ASC")->get();
        $categorias=Categoria::orderby('orden',"ASC")->get();
        $seccionEmpresa=SeccionInicio::find(1);
        $seccionSolucion=SeccionInicio::find(2);
        $marcas=Marcas::orderby('orden',"ASC")->get();
        $seccionMantenimiento=SeccionInicio::find(3);
        return view('inicio',compact('contactos','iconoSup','sliders','categorias','seccionEmpresa','seccionSolucion','marcas','seccionMantenimiento'));
        
    }
    public function cambiarIdioma(Request $request){
        Session::put('locale', $request->locale);

        return redirect()->back();
    }
}
