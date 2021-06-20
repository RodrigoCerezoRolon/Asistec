<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable=['orden','nombre'];
    public function subcategorias(){
        return $this->hasMany('App\Models\SubCategoria','category_id');
    }
    public function solucion(){
        return $this->hasOne('App\Models\Solucion','category_id');
    }
}
