<?php
    namespace App\Traits;

use App\Models\Traducciones;
use Illuminate\Support\Facades\App;

trait Translations{
        public function traduccion($column, $default=''){
            $locale=App::getLocale();
            if($this->locale==$locale){
                return $default;
            }
            $translation=Traducciones::where('table',$this->table)
                        ->where('column',$column)
                        ->where('row_id',$this->id)
                        ->where('locale',$locale)
                        ->first();
            if($translation){
                return $translation->translation;
            }else{
                return $default;
            }
        }
        public function crearTraduccion($table,$column,$id,$value,$locale){
            Traducciones::create([
                'table'=>$table,
                'column'=>$column,
                'row_id'=>$id,
                'locale'=>$locale,
                'translation'=>$value
            ]);
        }
        public function obtenerTraduccion($table,$column,$id,$locale){
             $traduccion=Traducciones::where('table',$table)
                ->where('column',$column)
                ->where('row_id',$id)
                ->where('locale',$locale)
                ->first();
            return $traduccion->translation;
        }
        public function actualizarTraduccion($table,$column,$id,$value,$locale){
            $traduccion=Traducciones::where('table',$table)
            ->where('column',$column)
            ->where('row_id',$id)
            ->where('locale',$locale)
            ->first();
            $traduccion->translation=$value;
            $traduccion->update();
        }
        public function eliminarTraducciones($table,$column,$id){
            $traducciones=Traducciones::where('table',$table)
            ->where('column',$column)
            ->where('row_id',$id)
            ->get();
            foreach ($traducciones as $traduccion) {
                $traduccion->delete();
            }
        }
    }
?>