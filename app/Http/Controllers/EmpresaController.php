<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Empresa;
use App\Models\Logos;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    public function editarEmpresa(){
        $empresa=Empresa::find(1);
        $empresa->texto_en=$empresa->obtenerTraduccion('empresas','texto',$empresa->id,'en');
        $empresa->texto_it=$empresa->obtenerTraduccion('empresas','texto',$empresa->id,'it');
        return view('admin.empresa.editarEmpresa',compact('empresa'));
    }
    public function actualizarEmpresa(Request $request){
        $Empresa=Empresa::find(1);
        if($request->has('imgEmpresa')){
            Storage::delete($Empresa->imagen);
            $Empresa->imagen= $request->file('imgEmpresa')->store('images');
        }
        if($Empresa->update($request->all())){
            $Empresa->actualizarTraduccion('empresas','texto',$Empresa->id,$request->texto_en,'en');
            $Empresa->actualizarTraduccion('empresas','texto',$Empresa->id,$request->texto_it,'it');
            return back()->with('success','Contenido Actualizado');
        }else{
            return back()->with('error','Algo salió mal');
        }
      
    }
    public function actualizarIconoEmpresa(Request $request,$id){
        $empresa=Empresa::find($id);
        if($request->has('imgIcono')){
            Storage::delete($empresa->imagen);
            $empresa->imagen= $request->file('imgIcono')->store('images');
        }
        if($empresa->update($request->all())){
            return back()->with('success','Contenido Actualizado');
        }else{
            return back()->with('error','Algo salió mal');
        }
    }
    public function vistaEmpresa(){
        $empresa=Empresa::find(1);
        $iconoUno=Empresa::find(2);
        $iconoDos=Empresa::find(3);
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $iconoInf=Logos::find(2);
        $sliders= Sliders::where('pagina','empresa')->orderby('orden',"ASC")->get();
        return view('empresa',compact('contactos','iconoSup','iconoInf','sliders','empresa','iconoUno','iconoDos'));
    }
}
