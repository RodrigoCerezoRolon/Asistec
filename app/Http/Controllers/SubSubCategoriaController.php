<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use App\Models\SubSubCategoria;
use Illuminate\Http\Request;

class SubSubCategoriaController extends Controller
{
    public function editarSubSubCategorias(){
        $subcategorias=SubCategoria::join('categorias','sub_categorias.category_id','=','categorias.id')
        ->orderby('categorias.nombre')->select('sub_categorias.*')->get();
        $subsubcategorias=SubSubCategoria::join('sub_categorias','sub_sub_categorias.subcategory_id','=','sub_categorias.id')
        ->orderby('sub_categorias.nombre')->select('sub_sub_categorias.*')->get();
        return view('admin.sub_subcategorias.editarsubsubcategorias',compact('subcategorias','subsubcategorias'));
    }
    public function agregarSubSubCategoria(Request $request){
        $subsubcategoria=new SubSubCategoria($request->all());
        if($archivo=$request->file('imgSubSubCategoria')){
            $nombre="img_subsubcat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $subsubcategoria->imagen=$nombre;
        }
        if($archivo=$request->file('archivo')){
            $nombre="archivo_subsubcat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $subsubcategoria->archivo=$nombre;
        }
        $subsubcategoria->save();
    }
    public function editarSubsubCategoria($id){
        $subsubcategoria=SubSubCategoria::find($id);
        return $subsubcategoria;
    }
    public function actualizarSubsubCategoria(Request $request,$id){
        $subsubcategoria=SubSubCategoria::find($id);
        if($archivo=$request->file('imgSubSubCategoriae')){
            $nombre="img_subsubcat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $subsubcategoria->imagen=$nombre;
        }
        if($archivo=$request->file('archivosubcat')){
            $nombre="archivo_subsubcat".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/productos',$nombre);
            $subsubcategoria->archivo=$nombre;
        }
        $subsubcategoria->update($request->all());
    }
    public function eliminarSubsubCategoria($id){
        $subsubcategoria=SubSubCategoria::find($id);
        if($subsubcategoria->soluciones()->get()->isEmpty()==true){
            $subsubcategoria->delete();
            return true;
        }else{
            return false;
        } 
    }
}
