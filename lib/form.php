<?php
namespace LIB;

abstract class Form {
    protected $modele;
    
    public function __construct($modele = null)
    {
       $this->modele =  $modele;
    }
      
    public function html()
    { 
    }
}
