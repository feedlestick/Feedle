<?php
namespace MVC;

class TableMysql extends Table {
    
      public function __construct($modeleEnregistrement = '\MVC\TableRow') {
          parent::__construct($modeleEnregistrement);
      }
      
      public static function getInstance() { parent::getInstance(); }
}
