<?php
    namespace App\Models\Traits\Mutators;
    use App\Traits\Translations;
    trait EmpresaMutators{
        use Translations;
        public function getTextoAttribute($value){
            return $this->traduccion('texto',$value);
        }
    }
 
?>