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
      
     public function getAllQuery($order = null, $limit = array()) 
     {
        $query = 'select * from ' . $this->getTableName();

        if (!is_null($order)) {
            $query.=' order by ' . $order;
        }
        
        if (sizeof($limit) == 2) {
            $query.= ' LIMIT ' . $limit[0] . ',' . $limit[1];
        }
        
        return $query;
     }
}
