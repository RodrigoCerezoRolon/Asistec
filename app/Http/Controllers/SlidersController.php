<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    public function EditarSlidersInicio(){
        $sliders= Sliders::where('pagina','inicio')->orderby('orden',"ASC")->get();
        return view('admin.inicio.slidersinicio',compact('sliders'));
   }
    public function EditarSlidersEmpresa(){
        $sliders= Sliders::where('pagina','empresa')->orderby('orden',"ASC")->get();
        return view('admin.empresa.slidersempresa',compact('sliders'));
    }
    public function EditarSlidersLaboratorio(){
        $sliders= Sliders::where('pagina','laboratorio')->orderby('orden',"ASC")->get();
        return view('admin.laboratorio.slidersLaboratorio',compact('sliders'));
    }
   public function EditarSlider($id){
       $slider= Sliders::findorFail($id);
       return $slider;
   }
   public function AgregarSlider(Request $request){
       $slider= new Sliders();
       $slider->orden=$request->orden;
       $slider->texto=$request->texto;
       $slider->pagina=$request->pagina;
       
       if($request->hasFile('imagen')){
           $slider->imagen=$request->file('imagen')->store('images/sliders');
       }
       $slider->save();
   }
   public function EliminarSlider($id){
       $slider= Sliders::findorFail($id);
       $slider->delete();
   }
   public function ActualizarSlider(Request $request,$id){
       $slider= Sliders::findorFail($id);
       if($request->hasFile('editar-imagen')){
           Storage::delete($slider->imagen);
           $slider->imagen=$request->file('editar-imagen')->store('images/sliders');
       }
       $slider->update($request->all());
   }
}
