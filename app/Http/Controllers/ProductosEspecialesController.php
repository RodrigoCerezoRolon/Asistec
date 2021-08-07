<?php

namespace App\Http\Controllers;

use App\Models\ProductoEspecial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosEspecialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $productos=ProductoEspecial::all();
        return view('admin.productosEspeciales.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.productosEspeciales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $producto= new ProductoEspecial($request->all());
        if($request->has('img_uno')){
            $producto->img_uno=$request->file('img_uno')->store('images/productos');
        }
        if($request->has('img_dos')){
            $producto->img_dos=$request->file('img_dos')->store('images/productos');
        }
        if($request->has('img_tres')){
            $producto->img_tres=$request->file('img_tres')->store('images/productos');
        }
        if($request->has('img_cuatro')){
            $producto->img_cuatro=$request->file('img_cuatro')->store('images/productos');
        }
       
     
       if($producto->save()){ 
           $producto->crearTraduccion('producto_especials','titulo',$producto->id,$request->titulo_en,'en');
           $producto->crearTraduccion('producto_especials','titulo',$producto->id,$request->titulo_it,'it');
           $producto->crearTraduccion('producto_especials','texto',$producto->id,$request->texto_en,'en');
           $producto->crearTraduccion('producto_especials','texto',$producto->id,$request->texto_it,'it');
           return back()->with('success','Producto Agregado');
       }else{
           return back()->with('error','Algo salió mal');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        
        return view('producto',compact('contactos','iconoSup','iconoInf','categorias','producto','catsel','productosel','locale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $producto=ProductoEspecial::find($id);
        $producto->titulo_en=$producto->obtenerTraduccion('producto_especials','titulo',$producto->id,'en');
        $producto->titulo_it=$producto->obtenerTraduccion('producto_especials','titulo',$producto->id,'it');
        $producto->texto_en=$producto->obtenerTraduccion('producto_especials','texto',$producto->id,'en');
        $producto->texto_it=$producto->obtenerTraduccion('producto_especials','texto',$producto->id,'it');
        return view('admin.productosEspeciales.edit',compact('producto'));
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
        $producto=ProductoEspecial::find($id);
        
        if($request->has('img_unoe')){
            Storage::delete($producto->img_uno);
            $producto->img_uno=$request->file('img_unoe')->store('images/productos');
        }
        if($request->has('img_dose')){
            Storage::delete($producto->img_dos);
            $producto->img_dos=$request->file('img_dose')->store('images/productos');
        }
        if($request->has('img_trese')){
            Storage::delete($producto->img_tres);
            $producto->img_tres=$request->file('img_trese')->store('images/productos');
        }
        if($request->has('img_cuatroe')){
            Storage::delete($producto->img_cuatro);
            $producto->img_cuatro=$request->file('img_cuatroe')->store('images/productos');
        }
        if($request->has('fichae')){
            Storage::delete($producto->ficha);
            $producto->ficha=$request->file('fichae')->store('fichas');
        }
        $producto->actualizarTraduccion('producto_especials','titulo',$producto->id,$request->titulo_en,'en');
        $producto->actualizarTraduccion('producto_especials','titulo',$producto->id,$request->titulo_it,'it');
        $producto->actualizarTraduccion('producto_especials','texto',$producto->id,$request->texto_en,'en');
        $producto->actualizarTraduccion('producto_especials','texto',$producto->id,$request->texto_it,'it');
        if($producto->update($request->all())){
            return back()->with('success',"Producto Actualizado");
        }else{
            return back()->with('error',"Algo salió mal");
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
        $producto=ProductoEspecial::find($id);
        $producto->eliminarTraducciones('producto_especials','titulo',$producto->id);
        $producto->eliminarTraducciones('producto_especials','texto',$producto->id);

        Storage::delete([$producto->img_uno,$producto->img_dos, $producto->img_tres, $producto->img_cuatro,$producto->ficha ]);
        $producto->delete();
    }
}
