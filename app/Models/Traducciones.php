<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traducciones extends Model
{
    use HasFactory;
    protected $fillable=['table','column','row_id','locale','translation'];
}
