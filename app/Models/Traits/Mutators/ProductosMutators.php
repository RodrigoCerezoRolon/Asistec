<?php
    namespace App\Models\Traits\Mutators;
    use App\Traits\Translations;
    trait ProductosMutators{
        use Translations;
        public function getTituloAttribute($value){
            return $this->traduccion('titulo',$value);
        }
        public function getTextoAttribute($value){
            return $this->traduccion('texto',$value);
        }
        public function getTextoVideoAttribute($value){
            return $this->traduccion('texto_video',$value);
        }
    }
 
?>