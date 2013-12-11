<?php

namespace MVC;

abstract class Table {

    protected $_tableRow='\\MVC\\TableRow';
    protected $_tableName;
    private $_primaryKey = 'id';
    private static $_pdo;

    private function __construct($tableName, $modeleEnregistrement = '\MVC\TableRow') {
        $this->_tableName=$tableName;
        $this->_tableRow = $modeleEnregistrement;
    }

    
    public function getTableName()
    {
        return $this->_tableName;
    }
    
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    
     /**
     * return une instance en fonction du type de bdd
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
    
    /***********************
     * 
     * Commun a toutes les base de données
     * 
     ************************/
    

    public function pdo() {
        if (!isset(self::$_pdo)) {
            self::$_pdo = Connexion::get();
        }
        return self::$_pdo;
    }

     public function get($id, $reload = false) {
        static $data = array();

        if (!isset($data[$this->_tableRow][$id]) or $reload) {
            $query = 'select * from ' . $this->getTableName() .
                    ' where ' . $this->_primaryKey . ' = ?';
            $queryPrepare = $this->pdo()->prepare($query);
            $queryPrepare->execute(array($id));
            
            $result = $queryPrepare->fetchAll(\PDO::FETCH_ASSOC);
            $rows = array();
            $nb_result = sizeof($result);

            for($i=0; $i<$nb_result; $i++)
            {
                $row = $result[$i];
                unset($result[$i]);
                $row_object = new $this->_tableRow();
                $row_object->setTable($this);

                foreach ($row as $key => $value) 
                {
                    $key = strtolower($key);
                    $row_object->$key = $value;
                }

                $rows[] = $row_object;
            }
            
            if (isset($rows[0])) 
            {
                $data[$this->_tableRow][$id] = $rows[0];
            } 
            else 
            {
                $data[$this->_tableRow][$id] = null;
            }
        }
        return $data[$this->_tableRow][$id];
    }
    
     function getAll($order = null, $limit = array()) 
     {
        $query = $this->getAllQuery($order, $limit);
        $result = $this->pdo()->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        $rows = array();
        $nb_result = sizeof($result);
        
        for($i=0; $i<$nb_result; $i++)
        {
            $row = $result[$i];
            unset($result[$i]);
            $row_object = new $this->_tableRow();
            $row_object->setTable($this);
            
            foreach ($row as $key => $value) {
                $key = strtolower($key);
                $row_object->$key = $value;
            }
            
            $rows[] = $row_object;
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
        $query = 'select * from ' . $this->getTableName() .
                ' where ' . $this->_primaryKey . ' = ?';
        $queryPrepare = $this->pdo()->prepare($query);
        $queryPrepare->execute(array($id));
        $result = $queryPrepare->fetchAll();
        return sizeof($result) > 0;
    }
    
    function countRows()
    {
        $query = 'select count(?) from ' . $this->getTableName();
        $queryPrepare = $this->pdo()->prepare($query);
        $queryPrepare->execute(array($this->_primaryKey));
        $result = $queryPrepare->fetchAll();
        
        return $result[0][0];
    }

    // TODO : Tableau associatif pour améliorer (execute)
    public function where($where, $params) {
        $query = 'select * from ' . $this->getTableName() . ' where ' . $where;
        
        $queryPrepare = $this->pdo()->prepare($query);
        $queryPrepare->execute($params);

        $result = $queryPrepare->fetchAll(\PDO::FETCH_ASSOC);
        $rows = array();
        $nb_result = sizeof($result);
        
        for($i=0; $i<$nb_result; $i++)
        {
            $row = $result[$i];
            unset($result[$i]);
            $row_object = new $this->_tableRow();
            $row_object->setTable($this);
            
            foreach ($row as $key => $value) {
                $key = strtolower($key);
                $row_object->$key = $value;
            }
            
            $rows[] = $row_object;
        }
        
        return $rows;
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
        $query = 'delete from ' . $this->getTableName() .
                ' where ' . $this->_primaryKey . ' = ?';
        $queryPrepare = $this->pdo()->prepare($query);
        return $queryPrepare->execute(array($id));
    }
    
    /************************** */
    
    abstract function newItem(); //OPTIMISABLE ?
    
    //Retourne la requete du getAll
    abstract function getAllQuery($order = null, $limit = array());
}
