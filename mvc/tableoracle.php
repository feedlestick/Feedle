<?php
namespace MVC;

/**
 * Class TableOracle permet de gèrer les tables d'une BDD ORACLE
 */
class TableOracle extends Table {
    
      /* Fonction newItem pour Oracle */
      public function newItem()
      {
        $item = new $this->_tableRow();
        $item->setTable($this);
        
        $query = 'SELECT column_name FROM user_tab_cols WHERE table_name =\''.strtoupper($this->getTableName()).'\'';
        $field_name = 'COLUMN_NAME';
            
        $colonnes = $this->pdo()->query($query)->fetchAll(\PDO::FETCH_CLASS);
 
        foreach ($colonnes as $col) {
            $field = strtolower($col->$field_name);
            $item->$field = null;
        }
        
        $item->id=null;
        return $item;      
      }
}