<?php
namespace LIB;

class Controleur{
    protected $_vue;
    
    function __construct($vue) {
        $this->_vue = $vue;
    }
	
    static function redirect($controler, $action)
    {  
        header('Location: index.php?a='.$action.'&c='.$controler); 
    }
    
}