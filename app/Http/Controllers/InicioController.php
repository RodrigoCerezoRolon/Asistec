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
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
    public function editarInicio(){
      
     
        $seccionEmpresa=SeccionInicio::find(1);
        $seccionSolucion=SeccionInicio::find(2);
        $marcas=Marcas::orderby('orden',"ASC")->get();
        return view('admin.inicio.editarInicio',compact('seccionEmpresa','marcas','seccionSolucion'));
    }
    public function actualizarSeccionEmpresa(Request $request,$id){
        $seccionEmpresa=SeccionInicio::find($id);
            if($id==1){
                if($request->file('imagenEmpresa')){
                    $seccionEmpresa->imagen=$request->file('imagenEmpresa')->store('images/inicio');
                }
            }else{
                if($request->file('imagenSolucion')){
                    $seccionEmpresa->imagen=$request->file('imagenSolucion')->store('images/inicio');
                }
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
        $sliders= Sliders::where('pagina','inicio')->orderby('orden',"ASC")->get();
        $categorias=Categoria::orderby('orden',"ASC")->get();
        // $subcategorias=SubCategoria::join('categorias','sub_categorias.category_id','=','categorias.id')
        // ->orderby('categorias.nombre')->select('sub_categorias.*')->get();
        // $subsubcategorias=SubSubCategoria::join('sub_categorias','sub_sub_categorias.subcategory_id','=','sub_categorias.id')
        // ->orderby('sub_categorias.nombre')->select('sub_sub_categorias.*')->get();
        // $productos=Producto::orderby('orden',"ASC")->take(8)->get();
        // $servicios=Servicio::orderby('orden',"ASC")->get();
        // $sectores=SectorServicio::orderby('orden',"ASC")->get();
        // $seccionEmpresa=SeccionInicio::find(1);
        return view('inicio',compact('contactos','iconoSup','sliders','categorias'));
        
    }
}
