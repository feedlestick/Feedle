<?php
namespace APPLI\M;

class Marque extends \MVC\Modele {
    protected $_tableName='marque';
    protected $_tableRow='\APPLI\M\MarqueRow';
    
     public function getNbMarque()
    {
        $query = 'select sum(quantity) from ' . $this->getTableName(); //Peut être a adapter en fonction des SGBDR
        $queryPrepare = $this->pdo()->prepare($query);
        $queryPrepare->execute();
        $result = $queryPrepare->fetchAll();
       
        return $result[0][0];
    }
}
