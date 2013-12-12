<?php
namespace APPLI\M;

class Mouvement extends \MVC\Modele {
    protected $_tableName='mouvement';
    protected $_tableRow='\APPLI\M\MouvementRow';
    
    public function getAllWithProduitName($order="id")
    {
       $result = \APPLI\M\Mouvement::getInstance()->getAll($order);
        
      /* for($i = 0; $i < sizeof($result); $i++)
       {
           $result[$i]->name = \APPLI\M\Produit::getInstance()->getProduitNameById($result[$i]->produit_id);
       }*/
        
        
        return $result;
    }   
    
    public function getMouvementsBetween($start, $end, $order="id")
    {
        return \APPLI\M\Mouvement::getInstance()->getAll($order, array($start, $end));
    }
}