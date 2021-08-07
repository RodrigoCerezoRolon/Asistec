<?php
    namespace App\Models\Traits\Mutators;
    use App\Traits\Translations;
    trait SubCategoriasMutators{
        use Translations;
        public function getNombreAttribute($value){
            return $this->traduccion('nombre',$value);
        }
    }
 
?>