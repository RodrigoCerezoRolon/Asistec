<?php

namespace App\Models;

use App\Models\Traits\Mutators\SeccionInicioMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solucion extends Model
{
    use HasFactory,SeccionInicioMutators;
    protected $guarded=['id'];

    public function productos(){
        return $this->belongsToMany(Producto::class,'productos_soluciones');
    }
}
