<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Logos;
use App\Models\SeccionInicio;
use App\Models\Solucion;
use App\Models\SubCategoria;
use App\Models\SubSubCategoria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SolucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soluciones=Solucion::all();
      
        return view('admin.soluciones.index',compact('soluciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::orderby('orden',"ASC")->get();
        $subcategorias=SubCategoria::join('categorias','sub_categorias.category_id','=','categorias.id')
        ->orderby('categorias.nombre')->select('sub_categorias.*')->get();
        $subsubcategorias=SubSubCategoria::join('sub_categorias','sub_sub_categorias.subcategory_id','=','sub_categorias.id')
        ->orderby('sub_categorias.nombre')->select('sub_sub_categorias.*')->get();
        return view('admin.soluciones.create',compact('categorias','subcategorias','subsubcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solucion= new Solucion($request->all());
        if($request->hasFile('img1')){
            $solucion->imagen=$request->file('img1')->store('images/soluciones');
        }
        try {
            $solucion->save();
            $solucion->crearTraduccion('solucions','titulo',$solucion->id,$request->titulo_en,'en');
            $solucion->crearTraduccion('solucions','titulo',$solucion->id,$request->titulo_it,'it');
            $solucion->crearTraduccion('solucions','texto',$solucion->id,$request->texto_en,'en');
            $solucion->crearTraduccion('solucions','texto',$solucion->id,$request->texto_it,'it');
            return back()->with('success',"Solucion Agregada");
        } catch (\Throwable $th) {
            //return $th->getMessage();
            return back()->with('error',$th->getMessage());
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
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $categorias=Categoria::orderby('orden',"ASC")->get();
        $solucion=Solucion::find($id);
        return view('solucion',compact('contactos','iconoSup','categorias','solucion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solucion=Solucion::find($id);
        $solucion->titulo_en=$solucion->obtenerTraduccion('solucions','titulo',$solucion->id,'en');
        $solucion->titulo_it=$solucion->obtenerTraduccion('solucions','titulo',$solucion->id,'it');
        $solucion->texto_en=$solucion->obtenerTraduccion('solucions','texto',$solucion->id,'en');
        $solucion->texto_it=$solucion->obtenerTraduccion('solucions','texto',$solucion->id,'it');
        $categorias=Categoria::orderby('orden',"ASC")->get();
        $subcategorias=SubCategoria::join('categorias','sub_categorias.category_id','=','categorias.id')
        ->orderby('categorias.nombre')->select('sub_categorias.*')->get();
        $subsubcategorias=SubSubCategoria::join('sub_categorias','sub_sub_categorias.subcategory_id','=','sub_categorias.id')
        ->orderby('sub_categorias.nombre')->select('sub_sub_categorias.*')->get();
        return view('admin.soluciones.edit',compact('solucion','categorias','subcategorias','subsubcategorias'));
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
        $solucion=Solucion::find($id);
        if($request->hasFile('img1')){
            Storage::delete($solucion->imagen);
            $solucion->imagen= $request->file('img1')->store('images/soluciones');
        }
        try {
            $solucion->actualizarTraduccion('solucions','titulo',$solucion->id,$request->titulo_en,'en');
            $solucion->actualizarTraduccion('solucions','titulo',$solucion->id,$request->titulo_it,'it');
            $solucion->actualizarTraduccion('solucions','texto',$solucion->id,$request->texto_en,'en');
            $solucion->actualizarTraduccion('solucions','texto',$solucion->id,$request->texto_it,'it');
            $solucion->update($request->all());
            return back()->with('success',"Solucion Actualizada");
        } catch (Exception $th) {
            return back()->with('error',$th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solucion=Solucion::find($id);
        $solucion->eliminarTraducciones('solucions','titulo',$solucion->id);
        $solucion->eliminarTraducciones('solucions','texto',$solucion->id);
        Storage::delete($solucion->imagen);
        $solucion->delete();
    }
    public function vistaSoluciones(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $categorias=Categoria::orderby('orden',"ASC")->get();
        $seccionSolucion=SeccionInicio::find(2);
        return view('soluciones',compact('contactos','iconoSup','categorias','seccionSolucion'));
    }
    public function buscarSolucionPorCategoria($id){
        $categoria=Categoria::find($id);
        $solucion=$categoria->solucion;
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $categorias=Categoria::orderby('orden',"ASC")->get();
        return view('solucion',compact('contactos','iconoSup','categorias','solucion'));
    }
    public function buscarSolucionPorSubCategoria($id){
        $subcategoria=SubCategoria::find($id);
        $solucion=$subcategoria->solucion;
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $categorias=Categoria::orderby('orden',"ASC")->get();
        return view('solucion',compact('contactos','iconoSup','categorias','solucion'));
    }
    public function buscarSolucionPorSubSubCategoria($id){
        $subsubcategoria=SubSubCategoria::find($id);
        $solucion=$subsubcategoria->solucion;
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $categorias=Categoria::orderby('orden',"ASC")->get();
        return view('solucion',compact('contactos','iconoSup','categorias','solucion'));
    }
}
