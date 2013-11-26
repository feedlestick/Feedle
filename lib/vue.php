<?php
namespace LIB;

class Vue {
    private $_fichier;
    private $_data;
    
    function __construct($c,$a) {
        $this->_fichier = strtolower(APP.'v/'.$c.'/'.$a.'.php');
        $this->_data=array();
    }
    
    function display(){
        //Add all include here
        include(APP.'v/_utils/header.php');
        //-------------
        
        include($this->_fichier);
        
        include(APP.'v/_utils/footer.php');
    }
	
    function __set($cle,$valeur){
        return $this->_data[$cle]=$valeur;
    }
    function __get($cle){
        return $this->_data[$cle];
    }
    
    function setFichier($fichier){
        $this->_fichier = strtolower(APP.'v/'.$fichier.'.php');
    }
}
