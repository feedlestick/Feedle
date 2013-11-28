<?php
namespace APPLI\M;

class Utilisateur extends \MVC\Modele {
    protected $_tableName='utilisateur';
    protected $_tableRow='\APPLI\M\UtilisateurRow';

    function verifIdentification($email,$password) {
        $utilisateur=  Utilisateur::getInstance()->where('email=? and password=?',array($email,sha1(\Install\App::SALT_BEFORE.$password. \Install\App::SALT_AFTER)));
        if(sizeof($utilisateur)>0){
            return $utilisateur[0];
        }else{
            return false;
        }
    }

}