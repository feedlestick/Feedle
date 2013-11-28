<?php
namespace MVC;

class A{
    static function post($cle,$defaut=null){
        if(isset($_POST[$cle])){
            return $_POST[$cle];
        }elseif(isset($_GET[$cle])){
            return $_GET[$cle];
        }else{
            return $defaut;
        }
    }
    
    static function getParams(){
        $params=array();
        foreach($_POST as $cle=>$valeur){
            $params[$cle]=$valeur;
        }
        foreach($_GET as $cle=>$valeur){
            $params[$cle]=$valeur;
        }
        
        return $params;
    }
    static function link($c,$a,$texte,$params=array(),$tooltip=''){
        $link='<a href=".?c='.$c.'&a='.$a;
        foreach ($params as $key=>$value) {
            $link.='&'.$key.'='.$value;
        }
        $link.='">'.$texte.'</a>';
        return $link;
    }
}