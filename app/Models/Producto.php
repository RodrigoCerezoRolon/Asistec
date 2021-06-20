<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function soluciones(){
        return $this->belongsToMany(Solucion::class,'productos_soluciones','prod_id');
    }
}
