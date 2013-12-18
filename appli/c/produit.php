<?php

namespace APPLI\C;

class Produit extends \MVC\Controleur {
    
    public function liste()
    {
        $type = \MVC\A::post("t", 1);
        $id = \MVC\A::post("id", 0);
        $produits = null;
        
        switch($type)
        {
            case 0:
                $produits = \APPLI\M\Produit::getInstance()->getProduitByTypeId($id);
                break;
            
            case 1: 
                $produits = \APPLI\M\Produit::getInstance()->getProduitByMarqueId($id);
                break;
        }
        
        
        foreach ($produits as $key => $values){
            $produits[$key]->categorie_str =  \APPLI\M\Type::getInstance()->getName($produits[$key]->type_id);
            $produits[$key]->marque_str = \APPLI\M\Marque::getInstance()->getName($produits[$key]->marque_id);
        }
        
        self::getVue()->produits = $produits;
    }
    
    static function item()
    {
        $id = \MVC\A::post("id", 1);
        $produit = \APPLI\M\Produit::getInstance()->get($id);
        
        if($produit != null)
        {
            self::getVue()->marque_str = \APPLI\M\Marque::getInstance()->getName($produit->marque_id);
            self::getVue()->type_str = \APPLI\M\Type::getInstance()->getName($produit->type_id);
        }
        
        self::getVue()->produit = $produit;
    }
}
