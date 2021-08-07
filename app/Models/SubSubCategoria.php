<?php

namespace App\Models;

use App\Models\Traits\Mutators\SubSubcategoriasMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategoria extends Model
{
    use HasFactory,SubSubcategoriasMutators;
    protected $fillable=['orden','nombre','imagen','subcategory_id'];
    public function subcategoria(){
        return $this->belongsTo('App\Models\SubCategoria','subcategory_id');
    }
    public function solucion(){
        return $this->hasOne('App\Models\Solucion','sub_subcategory_id');
    }
}
