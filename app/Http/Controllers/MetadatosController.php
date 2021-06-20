<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metadato;
class MetadatosController extends Controller
{
    public function show(){
        $metadatos=Metadato::all();
        return view('admin.metadatos.editarcontenido',compact('metadatos'));
    }
    public function edit($id){
        $metadato=Metadato::findorFail($id);
        return $metadato;
    }
    public function update(Request $request,$id){
        $metadato=Metadato::findorFail($id);
        $metadato->update($request->all());
    }
}
