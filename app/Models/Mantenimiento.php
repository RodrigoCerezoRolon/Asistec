<?php

namespace App\Models;

use App\Models\Traits\Mutators\MantenimientoMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory,MantenimientoMutators;
    protected $fillable=['orden','imagen','titulo','subtitulo','texto'];
}
