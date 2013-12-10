<?php

namespace MVC;

/*
 * ModeleRow est une interface pour les modèles pour générer les tablerow
 */
class ModeleRow implements \JsonSerializable {
    
    private $_tablerow;
  
    /**
     * Tout les paramètres non définis sont a définir sur la _tablerow et non sur modeleRow
     * @param type $name
     * @param type $value
     */
    public function __set ($name, $value)
    {
        if(!$this->_tablerow)
        {
             $this->_tablerow = TableRow::getInstance();
        }

        $this->_tablerow->$name = $value;
    }
    
    
    public function __get($name)
    {
        return $this->_tablerow->$name;
    }
     
    /**
     * Le constructeur sert en réalité a créez la tablerow
     */
    public function __construct()
    {
        $this->_tablerow = TableRow::getInstance();
    }
    
    /** Méthode interface **/
    
    /**
     * Sert a définir l'attribut table de _tableRow
     * @param String $table
     */
    public function setTable($table) {
        $this->_tablerow->setTable($table);
    }
    
    /**
     * Interface de la méthode store de tableRow
     * @param String $table
     * @param Object $pdo
     */
    public function store($table = null, $pdo = null) 
    { 
        $this->_tablerow->store($table, $pdo); 
    }

    public function jsonSerialize() {
        return $this->_tablerow;
    }

}
