<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\UploaderHandler;
use App\Models\Categoria;
use App\Models\Solucion;
use App\Models\SubCategoria;
use App\Models\SubSubCategoria;

class ProductosController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $productos=Producto::all();
        return view('admin.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $soluciones=Solucion::all();
        return view('admin.productos.create',compact('soluciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $producto= new Producto($request->all());
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
           $producto->soluciones()->attach($request->soluciones);
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
        $producto=Producto::find($id);
        $soluciones=Solucion::all();
        return view('admin.productos.edit',compact('producto','soluciones'));
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
        $producto=Producto::find($id);
        
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
        if($producto->update($request->all())){
            $producto->soluciones()->sync($request->soluciones);
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
        $producto=Producto::find($id);
        Storage::delete([$producto->img_uno,$producto->img_dos, $producto->img_tres, $producto->img_cuatro,$producto->ficha ]);
        $producto->delete();
    }

    public function vistaPresupuesto(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        return view('solicitarPresupuesto',compact('iconoSup','iconoInf','contactos'));
    }
    public function vistaProductos(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $productos=Producto::orderby('orden',"ASC")->get();
        return view('productos',compact('iconoSup','iconoInf','contactos','productos'));
    }
    public function vistaProducto($id){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $productos=Producto::orderby('orden',"ASC")->get();
        $producto=Producto::find($id);
        $prodreluno=null;
        $prodreldos=null;
        if($producto->prodrel_uno){
            $prodreluno=Producto::find($producto->prodrel_uno);
        }
        if($producto->prodrel_dos){
            $prodreldos=Producto::find($producto->prodrel_dos);
        }
        return view('producto',compact('iconoSup','iconoInf','contactos','productos','producto','prodreluno','prodreldos'));
    }
    public function vistaCalculadora(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        return view('calculadora',compact('iconoSup','iconoInf','contactos'));
    }
   
}
