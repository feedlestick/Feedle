<?php

namespace APPLI\C;

class Mouvement extends \MVC\Controleur {

    static function liste() {
        
    }

    static function data_liste() {
        $mouvements = \APPLI\M\Mouvement::getInstance()->getAllWithProduitName("id");

        self::getVue()->liste = $mouvements;
        self::getVue()->page = \MVC\A::post('p', 1);
    }

    static function mouvement() {
        
    }

}
