<?php

namespace MVC;

/**
 * Class TableOracle permet de gèrer les tables d'une BDD ORACLE
 */
class TableOracle extends Table {
    /* Fonction newItem pour Oracle */

    public function newItem() {
        $item = new $this->_tableRow();
        $item->setTable($this);

        $query = 'SELECT column_name FROM user_tab_cols WHERE table_name =\'' . strtoupper($this->getTableName()) . '\'';
        $field_name = 'COLUMN_NAME';

        $colonnes = $this->pdo()->query($query)->fetchAll(\PDO::FETCH_CLASS);

        foreach ($colonnes as $col) {
            $field = strtolower($col->$field_name);
            $item->$field = null;
        }

        $item->id = null;
        return $item;
    }

    //Retourne la requete du getAll
     public function getAllQuery($order = null, $limit = array()) 
     {
        $query = 'select * from ' . $this->getTableName();

         if (sizeof($limit) == 2) {
            $query.= ' where ROWNUM >=' . $limit[0] . ' and ROWNUM <=' . $limit[1];
         }
        
        if (!is_null($order)) {
            $query.=' order by ' . $order;
        }

        return $query;
    }

}
