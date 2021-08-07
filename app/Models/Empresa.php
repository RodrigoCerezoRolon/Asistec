<?php

namespace App\Models;

use App\Models\Traits\Mutators\EmpresaMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory,EmpresaMutators;
    protected $fillable=['texto','imagen'];
}
