<?php
namespace LIB;

//TODO : Pls work on me for ORACLE
class Connexion {

    private static $_pdo;

    private function __construct() {
        $dsn = 'mysql:dbname='
                . BDD_NAME
                . ';host='
                . BDD_HOST;
        self::$_pdo=new \PDO(
                $dsn, BDD_USER, BDD_PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    static public function get() {
        if (!isset(self::$_pdo)) {
            new Connexion();
        }
        return self::$_pdo;
    }

    static public function query($statement){     
        return self::get()->query($statement);
    }
    static function prepare($statement, $driver_options = array()) {
        return self::get()->prepare($statement, $driver_options);
    }
    
}