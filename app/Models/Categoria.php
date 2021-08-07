<?php

namespace App\Models;

use App\Models\Traits\Mutators\CategoriasMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory,CategoriasMutators;
    protected $fillable=['orden','nombre'];
    public function subcategorias(){
        return $this->hasMany('App\Models\SubCategoria','category_id');
    }
    public function solucion(){
        return $this->hasOne('App\Models\Solucion','category_id');
    }
}
