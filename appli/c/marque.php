<?php

namespace APPLI\C;

class Marque extends \MVC\Controleur {

    static function liste() {
        self::getVue()->marque_count = \APPLI\M\Marque::getInstance()->countRows();
        self::getVue()->marques = \APPLI\M\Marque::getInstance()->getAll();
    }
    
    static function item()
    {
        $marque_id = \MVC\A::post("id", 0);
        self::getVue()->marque_id = $marque_id;
        self::getVue()->marque_name = \APPLI\M\Marque::getInstance()->getName($marque_id);
    }
}
