<?php
    namespace App\Models\Traits\Mutators;
    use App\Traits\Translations;
    trait MantenimientoMutators{
        use Translations;
        public function getTituloAttribute($value){
            return $this->traduccion('titulo',$value);
        }
        public function getSubTituloAttribute($value){
            return $this->traduccion('subtitulo',$value);
        }
        public function getTextoAttribute($value){
            return $this->traduccion('texto',$value);
        }
    }
 
?>