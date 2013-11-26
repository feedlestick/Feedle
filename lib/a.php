<?php
namespace LIB;

class A {
    static function get($var,$defaut=null) {
        //action
        if (isset($_POST[$var])) {
            $a = $_POST[$var];
        } elseif (isset($_GET[$var])) {
            $a = $_GET[$var];
        } else {
            $a = $defaut;
        }
        return  htmlspecialchars($a);
    }

}
