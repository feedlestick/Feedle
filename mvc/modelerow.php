<?php

namespace MVC;

class ModeleRow {
    
    private static $_tablerow;
  
  
    public function __construct()
    {
        $this->_tablerow = new TableRow();
    }
    
    public function setTable($table) {
       $this->_tablerow->setTable($table);
    }
    
    public function store($table = null, $pdo = null) { $this->_tablerow->store($table, $pdo); }
}
