<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solucion extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    // public function productos(){
    //     return $this->belongsToMany(Producto::class,'productos_soluciones','solucion_id');
    // }
}
