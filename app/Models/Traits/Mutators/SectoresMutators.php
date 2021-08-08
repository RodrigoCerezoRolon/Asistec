<?php
    namespace App\Models\Traits\Mutators;
    use App\Traits\Translations;
    trait SectoresMutators{
        use Translations;
        public function getTituloAttribute($value){
            return $this->traduccion('titulo',$value);
        }
    }
 
?>