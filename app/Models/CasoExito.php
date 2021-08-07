<?php

namespace App\Models;

use App\Models\Traits\Mutators\SeccionInicioMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasoExito extends Model
{
    use HasFactory,SeccionInicioMutators;
    protected $guarded=['id'];
}
