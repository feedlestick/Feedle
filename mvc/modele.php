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
    
    /*
     * Retourne l'instance de Modele
     */
    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$_data[$class])) {
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
     * Retourne toute les données d'une table
     */
    public function getAll($order = null)
    {
        return $this->_table->getAll($order);
    }
}
