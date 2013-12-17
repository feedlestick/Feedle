<?php

namespace APPLI\C;

class Marque extends \MVC\Controleur {

    static function liste() {
        self::getVue()->marque_count = \APPLI\M\Marque::getInstance()->countRows();
        self::getVue()->marque = \APPLI\M\Marque::getInstance()->getAll();
    }
}
