<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Logos;
use App\Models\Sector;
use App\Models\Solucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectoresController extends Controller
{
    public function index(){
        $sectores=Sector::orderby('orden',"ASC")->get();
        $soluciones=Solucion::all();
        return view('admin.sectores.index',compact('sectores','soluciones'));
    }
    public function store(Request $request){
        $sector= new Sector($request->all());
        if($request->hasFile('imgSector')){
            $sector->imagen=$request->file('imgSector')->store('images/sectores');
        }
        try {
            $sector->save();
            $sector->crearTraduccion('sectors','titulo',$sector->id,$request->titulo_en,'en');
            $sector->crearTraduccion('sectors','titulo',$sector->id,$request->titulo_it,'it');
            return back()->with('success',"Sector Agregado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function edit($id){
        $sector=Sector::find($id);
        $sector->titulo_en=$sector->obtenerTraduccion('sectors','titulo',$sector->id,'en');
        $sector->titulo_it=$sector->obtenerTraduccion('sectors','titulo',$sector->id,'it');
        return $sector;
    }
    public function update(Request $request,$id){
        $sector=Sector::find($id);
        if($request->hasFile('imgSectore')){
            Storage::delete($sector->imagen);
            $sector->imagen=$request->file('imgSectore')->store('images/sectores');
        }
        $sector->actualizarTraduccion('sectors','titulo',$sector->id,$request->titulo_en,'en');
        $sector->actualizarTraduccion('sectors','titulo',$sector->id,$request->titulo_it,'it');
        $sector->update($request->all());
    }
    public function destroy($id){
        $sector=Sector::find($id);
        Storage::delete($sector->imagen);
        $sector->eliminarTraducciones('sectors','titulo',$sector->id);
        $sector->delete();
    }
    public function vistaSectores(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $sectoresEmpresa=Sector::orderby('orden',"ASC")->where('tipo',1)->get();
        $sectores=Sector::orderby('orden',"ASC")->where('tipo',2)->get();
        return view('sectores',compact('contactos','iconoSup','sectores','sectoresEmpresa'));
    }
}
