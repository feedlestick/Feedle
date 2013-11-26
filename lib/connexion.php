<?php
namespace LIB;

class Connexion {

    private static $_pdo;

    private function __construct() {
        $dsn = 'oci:dbname='.BDD_HOST.'/'.BDD_SERVICENAME.'';
        self::$_pdo=new \PDO($dsn, BDD_USER, BDD_PWD);
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