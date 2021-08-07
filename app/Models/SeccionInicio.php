<?php

namespace App\Models;

use App\Models\Traits\Mutators\SeccionInicioMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionInicio extends Model
{
    use HasFactory,SeccionInicioMutators;

    protected $fillable=['titulo','imagen','texto'];
}
