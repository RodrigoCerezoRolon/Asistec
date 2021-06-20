<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionInicio extends Model
{
    use HasFactory;

    protected $fillable=['titulo','imagen','texto'];
}
