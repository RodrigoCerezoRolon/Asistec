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
            return back()->with('success',"Sector Agregado");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function edit($id){
        return $sector=Sector::find($id);
    }
    public function update(Request $request,$id){
        $sector=Sector::find($id);
        if($request->hasFile('imgSectore')){
            Storage::delete($sector->imagen);
            $sector->imagen=$request->file('imgSectore')->store('images/sectores');
        }
        $sector->update($request->all());
    }
    public function destroy($id){
        $sector=Sector::find($id);
        Storage::delete($sector->imagen);
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
