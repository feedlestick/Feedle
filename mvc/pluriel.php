<?php
namespace MVC;

class Pluriel {
    static function pluriel($nb,$mot,$motPluriel=null){
        if($nb>1 or $nb<-1){
            if(is_null($motPluriel)){
                $motPluriel=$mot.'s';
            }
            return $nb.' '.$motPluriel;
        }else{
            return $nb.' '.$mot;
        }
    }
}