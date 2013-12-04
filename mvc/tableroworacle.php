<?php

namespace MVC;

class TableRowOracle extends TableRow {
    
    public function store($table = null, $pdo = null) {
        if (is_null($pdo)) {
            $pdo = Connexion::get();
        }
        if (is_null($table)) {
            $table = $this->_table;
        }
        $attributs = get_object_vars($this);
        
        //suppression des attributs de la classe TableRow
        $keys = array_keys($attributs);
        foreach ($keys as $cle) {
            if (substr($cle, 0, 1) == '_') {
                unset($attributs[$cle]);
            }
        }
        
        $values = array_values($attributs);
        $pdo->begintransaction();
       
        if (isset($this->id) and is_numeric($this->id)) {
            $query = 'update ' . $table->getTableName() . ' set ';
            $query.=implode('=?,', array_keys($attributs)) . '=?';
            $query.=' where id=?';
            $values[] = $this->id;
        } 
        else 
        {
            /* ORACLE GENERATE PK */
            $query_pk = 'select max('.$table->getPrimaryKey().') FROM '.$table->getTableName();
            $resultat = $pdo->query($query_pk)->fetchAll();
            $this->id = $resultat[0][0];
            $values = array_values($attributs);
            
            $query = 'insert into '
                    . $table->getTableName()
                    . '(' . implode(',', array_keys($attributs)) . ') values ('
                    . substr(str_repeat('?,', sizeof($attributs)), 0, -1) . ')';
            
        }
        $queryPrepare = $pdo->prepare($query);
        
        if (!$queryPrepare->execute($values)) 
        {
            $error = $queryPrepare->errorInfo();
            $pdo->rollback();
            throw new \Exception("\nPDO::errorInfo():\n" . $error[2]);
        }
        else {
            $pdo->commit();
        }
        
        if (!is_numeric($this->id)) 
        {  
           //$this->id = $pdo->lastInsertId(); //NOT YET IMPLEMENTED FOR ORACLE
           //throw new \Exception("Erreur ORACLE : ".$table->getPrimaryKey()." not a number value");
        }
        return $this;
    }
    
}