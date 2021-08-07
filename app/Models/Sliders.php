<?php

namespace App\Models;

use App\Models\Traits\Mutators\SlidersMutators;
use App\Traits\Translations;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use Translations,SlidersMutators;
    protected $fillable=['orden','imagen','texto','pagina'];
}
