<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Logos;
use App\Models\producto_especial;
use App\Models\ProductoEspecial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FabricacionController extends Controller
{
    public function vistaFabricacion(){
        $contactos=Contacto::all();
        $iconoSup=Logos::find(1);
        $fabricaciones=ProductoEspecial::all();
        
        return view('fabricacion',compact('contactos','iconoSup','fabricaciones'));
        
    }
}
