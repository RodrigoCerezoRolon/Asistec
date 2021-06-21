<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;
    protected $fillable=['orden','nombre','imagen','category_id'];
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','category_id');
    }
    public function subsubcategoria(){
        return $this->hasMany('App\Models\SubSubCategoria','subcategory_id');
    }
    public function solucion(){
        return $this->hasOne('App\Models\Solucion','subcategory_id');
    }
    
}
