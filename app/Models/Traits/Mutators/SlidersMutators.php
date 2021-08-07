<?php
    namespace App\Models\Traits\Mutators;
    use App\Traits\Translations;
    trait SlidersMutators{
        use Translations;
        public function getTextoAttribute($value){
            return $this->traduccion('texto',$value);
        }
    }
 
?>