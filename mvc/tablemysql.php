<?php
namespace MVC;

class TableMysql extends Table {
       /* Fonction newItem pour Mysql */
      public function newItem()
      {
        $item = new $this->_tableRow();
        $item->setTable($this);
        
        $query = 'show columns '.strtoupper($this->getTableName());
        $field_name = 'Field';
            
        $colonnes = $this->pdo()->query($query)->fetchAll(\PDO::FETCH_CLASS);
 
        foreach ($colonnes as $col) {
            $field = strtolower($col->$field_name);
            $item->$field = null;
        }
        
        $item->id=null;
        return $item;      
      }
}
