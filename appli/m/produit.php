<?php
namespace APPLI\M;

class Produit extends \MVC\Modele {
    protected $_tableName='produit';
    protected $_tableRow='\APPLI\M\ProduitRow';
    
    public function getNbProduitEnStock()
    {
        $query = 'select sum(quantity) from ' . $this->getTableName(); //Peut être a adapter en fonction des SGBDR
        $queryPrepare = $this->pdo()->prepare($query);
        $queryPrepare->execute();
        $result = $queryPrepare->fetchAll();
       
        return $result[0][0];
    }
    
    public function getAllProduit($order = "id")
    {
        return \APPLI\M\Produit::getInstance()->getAll($order);
    }
}