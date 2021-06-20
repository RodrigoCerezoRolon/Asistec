<?php

namespace App\Http\Controllers;

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
        $categoria= Mantenimiento::find($id);
        $request->validate([
            'orden'=>'required',
            'titulo'=>'required',
           
        ],[
            'orden.required'=>"El orden es requerido",
            'titulo.required'=>'El titulo es requerido',
           
        ]);
        if($request->has('imgServiciose')){
            Storage::delete($categoria->imagen);
            $categoria->imagen=$request->file('imgServiciose')->store('images/mantenimiento');
        }
        if($categoria->update($request->all())){
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
        Storage::delete($mantenimiento->imagen);
        $mantenimiento->delete();
    }
}
