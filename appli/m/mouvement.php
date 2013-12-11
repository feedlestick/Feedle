<?php
namespace APPLI\M;

class Mouvement extends \MVC\Modele {
    protected $_tableName='mouvement';
    protected $_tableRow='\APPLI\M\MouvementRow';
    
    public function getAllWithProduitName()
    {
  
    }   
    
    public function getAllMouvements($order="id")
    {
        return \APPLI\M\Mouvement::getInstance()->getAll($order);
    }
    
    public function getMouvementsBetween($start, $end, $order="id")
    {
        return \APPLI\M\Mouvement::getInstance()->getAll($order, array($start, $end));
    }
}