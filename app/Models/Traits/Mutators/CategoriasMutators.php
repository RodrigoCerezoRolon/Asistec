<?php
    namespace App\Models\Traits\Mutators;
    use App\Traits\Translations;
    trait CategoriasMutators{
        use Translations;
        public function getNombreAttribute($value){
            return $this->traduccion('nombre',$value);
        }
    }
 
?>