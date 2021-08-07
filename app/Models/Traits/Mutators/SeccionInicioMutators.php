<?php
    namespace App\Models\Traits\Mutators;
    use App\Traits\Translations;
    trait SeccionInicioMutators{
        use Translations;
        public function getTituloAttribute($value){
            return $this->traduccion('titulo',$value);
        }
        public function getTextoAttribute($value){
            return $this->traduccion('texto',$value);
        }
    }
 
?>