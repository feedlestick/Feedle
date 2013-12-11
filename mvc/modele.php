<?php

namespace MVC;

/**
 * Modele est une class abstraite qui set d'interface entre Modele et Table
 */
abstract class Modele {
    
    private $_table; /* Instance de table générer */
    private static $_data = array(); /* Une seule instance de modele autoriser */
     
    private function __construct() //Appeler uniquement par getInstance
    { 
        $this->_table = Table::getInstance($this->_tableName, $this->_tableRow);
    }
    
    public function getTableName()
    {
        return $this->_table->getTableName();
    }
    
    protected function pdo()
    {
        return $this->_table->pdo();
    }
    
    /*
     * Retourne l'instance de Modele
     */
    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$_data[$class])){
            self::$_data[$class] = new $class();
        }
        return self::$_data[$class];
    }
    
    /*
     * Interface pour la fonction where de table
     */
    public function where($where, $params) {
        return $this->_table->where($where, $params);
    }

    /*
     * Interface pour la fonction newItem de table
     */
    public function newItem() { 
        return $this->_table->newItem(); 
        
    }
    
    /*
     * Interface pour la fonction countRows de table
     */
    public function countRows(){
        return $this->_table->countRows();
    }
    
    /*
     * Retourne toute les données d'une table
     */
    public function getAll($order = null, $limit = array())
    {
        return $this->_table->getAll($order, $limit);
    }
}
