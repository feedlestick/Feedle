<?php
namespace Install;

class App{
    const C="utilisateur"; //Controleur par défaut
    const A="identification"; //Action par défaut
    const NAME='Feedle'; //Nom de l'application
    static $utilisateur=null; //Utilisateur par défault

    const BDD_TYPE = \MVC\BddType::ORACLE; //Type de la base de données (oracle||mysql)
    
    const SALT_BEFORE='sdfj 5(-q*/DA';
    const SALT_AFTER='rccà9_6}Hé';
   
}