<?php

namespace APPLI\C;

class Type extends \MVC\Controleur {

    static function liste() {
        self::getVue()->type_count = \APPLI\M\Type::getInstance()->countRows();
    }
}
