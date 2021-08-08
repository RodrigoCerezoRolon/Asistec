<?php

namespace App\Models;

use App\Models\Traits\Mutators\SectoresMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory,SectoresMutators;
    protected $guarded=['id'];
    public function soluciones(){
        return $this->belongsToMany(Solucion::class,'sectors_solucions');   
    }
}
