<?php
namespace MVC;

class TableOracle extends Table {
    
      public function newItem()
      {
        $item = new $this->_tableRow();
        $item->setTable($this->_tableName);
        
        $query = 'SELECT column_name FROM user_tab_cols WHERE table_name =\''.strtoupper($this->_tableName).'\'';
        $field_name = 'COLUMN_NAME';
            
        $colonnes = $this->pdo()->query($query)->fetchAll(\PDO::FETCH_CLASS);
 
        foreach ($colonnes as $col) {
            $field = strtolower($col->$field_name);
            $item->$field = null;
        }
        $item->id=null;
        
        var_dump($item);

        return $item;      
      }
}