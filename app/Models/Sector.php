<?php

namespace App\Models;

use App\Models\Traits\Mutators\CategoriasMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory,CategoriasMutators;
    protected $guarded=['id'];
}
