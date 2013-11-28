<?php

namespace MVC;

class Connexion {

    private static $_pdo;

    private function __construct(){
	switch(\Install\App::BDD_TYPE)
	{
            //oracle pdo
            case \MVC\BddType::ORACLE:
                $dsn = 'oci:dbname='.  \Install\Bdd_ORACLE::HOST.'/'.  \Install\Bdd_ORACLE::SERVICENAME.'';
                self::$_pdo=new \PDO($dsn, \Install\Bdd_ORACLE::USER, \Install\Bdd_ORACLE::PWD);
            break;

            //mysql pdo
            case \MVC\BddType::MYSQL:
                $dsn = 'mysql:dbname=' .\Install\Bdd_MYSQL::NAME.';host='.\Install\Bdd_MYSQL::HOST;
                self::$_pdo=new \PDO($dsn, \Install\Bdd_MYSQL::USER, \Install\Bdd_MYSQL::PWD, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            break;

            //sqlserver pdo
            case \MVC\BddType::SQLSERVER:
            break;
        
            //invalid bdd type
            default:
                throw new Exception('BDD_TYPE in app.php invalid');
            break;
	}
    }

    static public function get() {
        if (!isset(self::$_pdo)) {
            new Connexion();
        }
        return self::$_pdo;
    }

    /**
     *
     * @param String $statement
     * @return PDOStatement
     */
    static public function query($statement){
        return self::get()->query($statement);
    }
    
    static function prepare($statement, $driver_options = array()) {
        return self::get()->prepare($statement, $driver_options);
    }
    
    static function table($statement,$params){
        $queryPrepare=self::get()->prepare($statement);
        if($queryPrepare->execute($params)){
            return $queryPrepare->fetchAll();
        }else{
            return false;
        }
    }

}