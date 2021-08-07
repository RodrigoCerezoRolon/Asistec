<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CategoriasController extends Controller
{
    public function editarCategorias(){
        $categorias=Categoria::orderby('orden',"ASC")->get();
        return view('admin.categorias.editarcategorias',compact('categorias'));
    }
    public function agregarCategoria(Request $request){
        $categoria= new Categoria($request->all());
        if($archivo=$request->file('imgCategoria')){
            $nombre="img_cat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $categoria->imagen=$nombre;
        }
        if($archivo=$request->file('archivo')){
            $nombre="archivo_cat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $categoria->archivo=$nombre;
        }
        $categoria->save();
        $categoria->crearTraduccion('categorias','nombre',$categoria->id,$request->nombre_en,'en');
        $categoria->crearTraduccion('categorias','nombre',$categoria->id,$request->nombre_it,'it');

    }
    public function editarCategoria($id){
        $categoria=Categoria::find($id);
        $categoria->nombre_en=$categoria->obtenerTraduccion('categorias','nombre',$categoria->id,'en');
        $categoria->nombre_it=$categoria->obtenerTraduccion('categorias','nombre',$categoria->id,'it');
        return $categoria;
    }
    public function actualizarCategoria(Request $request,$id){
        $categoria=Categoria::find($id);
        if($archivo=$request->file('imgCategoriae')){
            $nombre="img_cat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $categoria->imagen=$nombre;
        }
        if($archivo=$request->file('archivoe')){
            $nombre="archivo_cat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $categoria->archivo=$nombre;
        }
        $categoria->actualizarTraduccion('categorias','nombre',$categoria->id,$request->nombre_en,'en');
        $categoria->actualizarTraduccion('categorias','nombre',$categoria->id,$request->nombre_it,'it');

        $categoria->update($request->all());
    }
    public function eliminarCategoria($id){
        $categoria=Categoria::find($id);
        $categoria-> eliminarTraducciones('categorias','nombre',$categoria->id);
        if($categoria->subcategorias()->get()->isEmpty()==true && $categoria->soluciones()->get()->isEmpty()==true){
            $categoria->delete();
            return true;
        }else{
            return false;
        } 
    }
    public function filtrarSelectorCategoria($id){
        $categoria=Categoria::find($id);
        $subcategorias=$categoria->subcategorias()->get();
        if(($subcategorias)->isEmpty()){
           return true;
        }else{
            return $subcategorias;
        }
    }
}
