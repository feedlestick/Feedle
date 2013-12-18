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
    
    
    public function getProduitNameById($id)
    {
        $query = 'select name from ' . $this->getTableName();
        $query .='where '.$this->getPrimaryKey().' = ?';
        $queryPrepare = $this->pdo()->prepare($query);
        $queryPrepare->execute(array($id));
        $result = $queryPrepare->fetchAll();
        
        var_dump($result);
        
        return $result;
    }
    
    public function getProduitByMarqueId($id)
    {
        return $this->where("marque_id=?", array($id));
    }
    
    public function getProduitByTypeId($id)
    {
        return $this->where("type_id=?", array($id));
    }
}