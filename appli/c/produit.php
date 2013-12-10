<?php
namespace APPLI\C;

class Produit extends \MVC\Controleur{
    
    static function liste() 
    {
        $produits = \APPLI\M\Produit::getInstance()->getAll();
        self::getVue()->liste=$produits;
    }
    
    static function mouvement()
    {
        
    }
    
    static function statistique()
    {
        
    }
}
