<?php

namespace MVC;

abstract class Modele {
    
    private $_table;
    private static $_data = array();
     
    private function __construct()
    { 
        $this->_table = Table::getInstance($this->_tableName, $this->_tableRow);
    }
    
    //Return
    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$_data[$class])) {
            self::$_data[$class] = new $class();
        }
        return self::$_data[$class];
    }
    
    public function where($where, $params) {
        $this->_table->where($where, $params); 
        
    }
    public function newItem() { return $this->_table->newItem(); }
}
