<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Diseno;
use App\Models\Logos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DisenoController extends Controller
{
    public function index(){
        $diseño=Diseno::all()->first();
        return view('admin.diseño.editarContenido',compact('diseño'));
    }
    public function update(Request $request){
        $diseño=Diseno::all()->first();
        if($request->hasFile('img')){
            Storage::delete($diseño->imagen);
            $diseño->imagen=$request->file('img')->store('images/diseño');
        }
        if($diseño->update($request->all())){
            return back()->with('success',"Contenido Actualizado");
        }else{
            return back()->with('error','Algo salió mal');
        }
    }
    public function vistaDiseño(){
        $diseño=Diseno::all()->first();
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        return view('diseño',compact('diseño','contactos','iconoSup','iconoInf'));
    }
}
