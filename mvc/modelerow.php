<?php

namespace MVC;

/*
 * ModeleRow est une interface pour les modèles pour générer les tablerow
 */
class ModeleRow {
    
    private $_tablerow;
  
    //Tout les paramètres non définis sont a définir sur la _tablerow et non sur modeleRow
    public function __set ($name, $value)
    {
        $this->_tablerow->$name = $value;
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
}
