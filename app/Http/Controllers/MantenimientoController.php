<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Mantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mantenimientos=Mantenimiento::orderby('orden',"ASC")->get();
        return view('admin.mantenimiento.listadoMatenimientos',compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.mantenimiento.agregarMantenimiento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'orden'=>'required',
            'titulo'=>'required',
            'imgServicios'=>'required'
        ],[
            'orden.required'=>"El orden es requerido",
            'titulo.required'=>'El titulo es requerido',
            'imgServicios.required'=>'La imagen es requerida'
        ]);
        $mantenimiento= new Mantenimiento($request->all());
        if($request->has('imgServicios')){
            $mantenimiento->imagen=$request->file('imgServicios')->store('images/mantenimiento');
        }
        if($mantenimiento->save()){
            $mantenimiento->crearTraduccion('mantenimientos','titulo',$mantenimiento->id,$request->titulo_en,'en');
            $mantenimiento->crearTraduccion('mantenimientos','titulo',$mantenimiento->id,$request->titulo_it,'it');
            $mantenimiento->crearTraduccion('mantenimientos','subtitulo',$mantenimiento->id,$request->subtitulo_en,'en');
            $mantenimiento->crearTraduccion('mantenimientos','subtitulo',$mantenimiento->id,$request->subtitulo_it,'it');
            $mantenimiento->crearTraduccion('mantenimientos','texto',$mantenimiento->id,$request->texto_en,'en');
            $mantenimiento->crearTraduccion('mantenimientos','texto',$mantenimiento->id,$request->texto_it,'it');
            return back()->with('success','Servicio Agregado');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio=Mantenimiento::find($id);
        $servicio->titulo_en=$servicio->obtenerTraduccion('mantenimientos','titulo',$servicio->id,'en');
        $servicio->titulo_it=$servicio->obtenerTraduccion('mantenimientos','titulo',$servicio->id,'it');
        $servicio->subtitulo_en=$servicio->obtenerTraduccion('mantenimientos','subtitulo',$servicio->id,'en');
        $servicio->subtitulo_it=$servicio->obtenerTraduccion('mantenimientos','subtitulo',$servicio->id,'it');
        $servicio->texto_en=$servicio->obtenerTraduccion('mantenimientos','texto',$servicio->id,'en');
        $servicio->texto_it=$servicio->obtenerTraduccion('mantenimientos','texto',$servicio->id,'it');
        return view('admin.mantenimiento.editarMantenimiento',compact('servicio'));
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
        $servicio= Mantenimiento::find($id);
        $request->validate([
            'orden'=>'required',
            'titulo'=>'required',
           
        ],[
            'orden.required'=>"El orden es requerido",
            'titulo.required'=>'El titulo es requerido',
           
        ]);
        if($request->has('imgServiciose')){
            Storage::delete($servicio->imagen);
            $servicio->imagen=$request->file('imgServiciose')->store('images/mantenimiento');
        }
        $servicio->actualizarTraduccion('mantenimientos','titulo',$servicio->id,$request->titulo_en,'en');
        $servicio->actualizarTraduccion('mantenimientos','titulo',$servicio->id,$request->titulo_it,'it');
        $servicio->actualizarTraduccion('mantenimientos','subtitulo',$servicio->id,$request->subtitulo_en,'en');
        $servicio->actualizarTraduccion('mantenimientos','subtitulo',$servicio->id,$request->subtitulo_it,'it');
        $servicio->actualizarTraduccion('mantenimientos','texto',$servicio->id,$request->texto_en,'en');
        $servicio->actualizarTraduccion('mantenimientos','texto',$servicio->id,$request->texto_it,'it');
        if($servicio->update($request->all())){
            return back()->with('success','Servicio Actualizado');
        }else{
            return back()->with('error','Algo salió mal');
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
        $mantenimiento=Mantenimiento::find($id);
        $mantenimiento->eliminarTraducciones('mantenimientos','titulo',$mantenimiento->id);
        $mantenimiento->eliminarTraducciones('mantenimientos','subtitulo',$mantenimiento->id);
        $mantenimiento->eliminarTraducciones('mantenimientos','texto',$mantenimiento->id);
        Storage::delete($mantenimiento->imagen);
        $mantenimiento->delete();
    }
    public function vistaMantenimiento(){
        $servicios=Mantenimiento::orderby('orden',"ASC")->get();
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        return view('mantenimiento',compact('contactos','iconoSup','servicios'));
    }
}
