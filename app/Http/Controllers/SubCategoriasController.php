<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

class SubCategoriasController extends Controller
{
    public function editarSubcategorias(){
        $categorias=Categoria::orderby('nombre',"ASC")->get();
        $subcategorias=SubCategoria::join('categorias','sub_categorias.category_id','=','categorias.id')
        ->orderby('categorias.nombre')->select('sub_categorias.*')->get();
        return view('admin.subcategorias.editarsubcategorias',compact('subcategorias','categorias'));
    }
    public function agregarSubCategoria(Request $request){
        $subcategoria=new SubCategoria($request->all());
        if($archivo=$request->file('imgSubCategoria')){
            $nombre="img_subcat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $subcategoria->imagen=$nombre;
        }
        if($archivo=$request->file('archivo')){
            $nombre="archivo_subcat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $subcategoria->archivo=$nombre;
        }
        $subcategoria->save();
    }
    public function editarSubCategoria($id){
        $subcategoria=SubCategoria::find($id);
        return $subcategoria;
    }
    public function actualizarSubCategoria(Request $request,$id){
        $subcategoria=SubCategoria::find($id);
        if($archivo=$request->file('imgSubCategoriae')){
            $nombre="img_subcat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $subcategoria->imagen=$nombre;
        }
        if($archivo=$request->file('archivoe')){
            $nombre="archivo_subcat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $subcategoria->archivo=$nombre;
        }
        $subcategoria->update($request->all());
    }
    public function eliminarSubCategoria($id){
        $subcategoria=SubCategoria::find($id);
        if($subcategoria->subsubcategoria()->get()->isEmpty()==true && $subcategoria->soluciones()->get()->isEmpty()==true){
            $subcategoria->delete();
            return true;
        }else{
            return false;
        } 
    }
    public function filtrarSelectorSubCategoria($id){
        $subcategoria=SubCategoria::find($id);
        $subsubcategorias=$subcategoria->subsubcategoria()->get();
        if(($subsubcategorias)->isEmpty()){
           return true;
        }else{
            return $subsubcategorias;
        }
    }
}
