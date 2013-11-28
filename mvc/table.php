<?php

namespace MVC;

abstract class Table {

    protected $_tableRow='\\MVC\\TableRow';
    protected $_tableName;
    
    private static $_pdo;
    
    private $_primaryKey = 'id';

    protected function __construct($tableName, $modeleEnregistrement = '\MVC\TableRow') {
        $this->_tableName=$tableName;
        $this->_tableRow = $modeleEnregistrement;
    }

    
    /***********************
     * 
     * Commun a toutes les tables
     * 
     ************************/
    
    /**
     * return an instance
     * @return \MVC\Table
     */
    public static function getInstance($tableName, $tableRow) {
        switch(\Install\App::BDD_TYPE)
        {
            case BddType::ORACLE: 
                return new TableOracle($tableName, $tableRow);
                break;
            
            case BddType::MYSQL: 
                return new TableMysql();
                break;
            
            case BddType::SQLSERVER:
                throw new Exception('Not Yet Implented');
                break;
            
            default:
                throw new Exception('Invalid BDD Type');
                break;
        }
    }

    protected function pdo() {
        if (!isset(self::$_pdo)) {
            self::$_pdo = Connexion::get();
        }
        return self::$_pdo;
    }

     public function get($id, $reload = false) {
        static $data = array();

        if (!isset($data[$this->_tableRow][$id]) or $reload) {
            $query = 'select * from ' . $this->_tableName .
                    ' where ' . $this->_primaryKey . ' = ?';
            $queryPrepare = $this->pdo()->prepare($query);
            $queryPrepare->execute(array($id));
            $result = $queryPrepare->fetchAll(
                    \PDO::FETCH_CLASS, $this->_tableRow
            );
            if (isset($result[0])) {
                $result[0]->setTable($this->_tableName);
                $data[$this->_tableRow][$id] = $result[0];
            } else {
                $data[$this->_tableRow][$id] = null;
            }
        }
        return $data[$this->_tableRow][$id];
    }
    
     function getAll($order = null) {
        $query = 'select * from ' . $this->_tableName;
        if (!is_null($order)) {
            $query.=' order by ' . $order;
        }
        $rows=$this->pdo()->query($query)->fetchAll(
                        \PDO::FETCH_CLASS, $this->_tableRow
        );
        foreach ($rows as $row) {
            $row->setTable($this->_tableName);
        }
        return $rows;
    }
    
    function getListe($libelle = 'libelle', $order = null) {
        if (is_null($order)) {
            $order = $libelle;
        }
        $listeObjets = $this->getAll($order);
        $liste = array();
        foreach ($listeObjets as $objet) {
            $liste[$objet->id] = $objet->$libelle;
        }
        return $liste;
    }
    
    function exists($id) {
        $query = 'select * from ' . $this->_tableName .
                ' where ' . $this->_primaryKey . ' = ?';
        $queryPrepare = $this->pdo()->prepare($query);
        $queryPrepare->execute(array($id));
        $result = $queryPrepare->fetchAll(
                \PDO::FETCH_CLASS, $this->_tableRow
        );
        return sizeof($result) > 0;
    }
    
    abstract function newItem();

    // TODO : Tableau asso
    function where($where, $params) {
        $query = 'select * from ' . $this->_tableName . ' where ' . $where;
        $queryPrepare = $this->pdo()->prepare($query);
        $queryPrepare->execute($params);
        $result = $queryPrepare->fetchAll(
                \PDO::FETCH_CLASS, $this->_tableRow
        );
        foreach ($result as $o) {
            $o->setTable($this->_tableName);
        }
        return $result;
    }

    function whereFirst($where, $params) {
        $result = $this->where($where, $params);
        if (isset($result[0])) {
            return $result[0];
        } else {
            return null;
        }
    }

    function delete($id) {
        $query = 'delete from ' . $this->_tableName .
                ' where ' . $this->_primaryKey . ' = ?';
        $queryPrepare = $this->pdo()->prepare($query);
        return $queryPrepare->execute(array($id));
    }

}
