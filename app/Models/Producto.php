<?php

namespace App\Models;

use App\Models\Traits\Mutators\ProductosMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory,ProductosMutators;
    protected $guarded=['id'];

    public function soluciones(){
        return $this->belongsToMany(Solucion::class,'productos_soluciones');
    }
}
