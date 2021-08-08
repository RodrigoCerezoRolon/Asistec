<?php

namespace App\Http\Controllers;

use App\Models\CasoExito;
use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Solucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CasosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casos=CasoExito::orderby('orden',"ASC")->get();
        return view('admin.casos.index',compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $soluciones=Solucion::all();
        return view('admin.casos.create',compact('soluciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caso= new CasoExito($request->all());
        if($request->hasFile('logo')){
            $caso->logo=$request->file('logo')->store('images/casos');
        }
        if($request->hasFile('img')){
            $caso->imagen=$request->file('img')->store('images/casos');
        }
        if($request->hasFile('arch')){
            $caso->archivo=$request->file('arch')->store('images/casos');
        }
        try {
            $caso->save();
            $caso->crearTraduccion('caso_exitos','titulo',$caso->id,$request->titulo_en,'en');
            $caso->crearTraduccion('caso_exitos','titulo',$caso->id,$request->titulo_it,'it');
            $caso->crearTraduccion('caso_exitos','texto',$caso->id,$request->texto_en,'en');
            $caso->crearTraduccion('caso_exitos','texto',$caso->id,$request->texto_it,'it');
            $caso->soluciones()->attach($request->soluciones);
            return back()->with('success',"Caso agregado");
        } catch (\Throwable $th) {
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
        $caso=CasoExito::find($id);
        $caso->titulo_en=$caso->obtenerTraduccion('caso_exitos','titulo',$caso->id,'en');
        $caso->titulo_it=$caso->obtenerTraduccion('caso_exitos','titulo',$caso->id,'it');
        $caso->texto_en=$caso->obtenerTraduccion('caso_exitos','texto',$caso->id,'en');
        $caso->texto_it=$caso->obtenerTraduccion('caso_exitos','texto',$caso->id,'it');
        $soluciones=Solucion::all();
        return view('admin.casos.edit',compact('caso','soluciones'));
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
        $caso=CasoExito::find($id);
        if($request->hasFile('logo')){
            Storage::delete($caso->logo);
            $caso->logo=$request->file('logo')->store('images/casos');
        }
        if($request->hasFile('img')){
            Storage::delete($caso->imagen);
            $caso->imagen=$request->file('img')->store('images/casos');
        }
        if($request->hasFile('arch')){
            Storage::delete($caso->archivo);
            $caso->archivo=$request->file('arch')->store('images/casos');
        }
        try {
            $caso->actualizarTraduccion('caso_exitos','titulo',$caso->id,$request->titulo_en,'en');
            $caso->actualizarTraduccion('caso_exitos','titulo',$caso->id,$request->titulo_it,'it');
            $caso->actualizarTraduccion('caso_exitos','texto',$caso->id,$request->texto_en,'en');
            $caso->actualizarTraduccion('caso_exitos','texto',$caso->id,$request->texto_it,'it');
            $caso->update($request->all());
            $caso->soluciones()->sync($request->soluciones);
            return back()->with('success',"Caso actualizado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
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
        $caso=CasoExito::find($id);
        $caso->eliminarTraducciones('caso_exitos','titulo',$caso->id);
        $caso->delete();
    }
    public function vistaCasos(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $casos=CasoExito::orderby('orden',"ASC")->get();
        return view('casos',compact('contactos','iconoSup','casos'));
    }
}
