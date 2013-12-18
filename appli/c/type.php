<?php

namespace APPLI\C;

class Type extends \MVC\Controleur {

    static function liste() {
        self::getVue()->type_count = \APPLI\M\Type::getInstance()->countRows();
    }
    
    static function listeAll()
    {
        self::getVue()->types = \APPLI\M\Type::getInstance()->getAll();
    }
    
    static function listeLevel()
    {
        $type_id = \MVC\A::post("type", 0);
        $types = \APPLI\M\Type::getInstance()->getTypeByTypeSupp($type_id);
        
        foreach ($types as $key => $values){
            $types[$key]->as_subtype =  \APPLI\M\Type::getInstance()->hasSubType($types[$key]->id);
        }
        
        self::getVue()->currentType = $type_id;
        self::getVue()->prevType = \APPLI\M\Type::getInstance()->getSupType($type_id);
        self::getVue()->types = $types;
        self::getVue()->type_str = \APPLI\M\Type::getInstance()->getName($type_id);
    }
    
     static function item()
    {
        $type_id = \MVC\A::post("id", 0);
        self::getVue()->type_id = $type_id;
        self::getVue()->type_name = \APPLI\M\Type::getInstance()->getName($type_id);
    }
}
