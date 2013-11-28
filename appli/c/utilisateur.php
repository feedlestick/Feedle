<?php
namespace APPLI\C;

class Utilisateur extends \MVC\Controleur{
    static function identification(){
        if(isset($_SESSION['utilisateur']) and $_SESSION['utilisateur']){
            self::redirect('Utilisateur', 'tableauDeBord');
        }
    }
    static function verifIdentification($params){
        if(isset($_SESSION['utilisateur']) and $_SESSION['utilisateur']){
            self::redirect('Utilisateur', 'tableauDeBord');
        }else{
            $utilisateur=  \APPLI\M\Utilisateur::getInstance()->verifIdentification($params['email'],$params['password']);
            if($utilisateur){
                $_SESSION['utilisateur']=  serialize($utilisateur);
                \Install\App::$utilisateur=  $utilisateur;
                //self::redirect('Utilisateur', 'tableauDeBord');
            }else{
                $_SESSION['messages']['danger'][]='Erreur lors de l\'identification';
                self::redirect('Utilisateur', 'identification');
            }
        }
    }
    
    static function tableauDeBord(){
    }
    static function logout(){
        unset($_SESSION['utilisateur']);
        session_destroy();
        self::redirect('Utilisateur', 'identification');
    }
    static function menu(){
        self::getVue()->series= \Install\App::$utilisateur->series();
    }
    static function creerCompte(){
        
    }
    static function creerCompteConfirm($params){
        $emailExistant=\APPLI\M\Utilisateur::getInstance()->where('email=?',array($params['email']));
        if(sizeof($emailExistant)>0){
            $_SESSION['messages']['danger'][]='Email existant';
            self::redirect('Utilisateur','creerCompte');
        }elseif($params['password']!=$params['password2']){
            $_SESSION['messages']['danger'][]='Erreur dans la confirmation du mot de passe';
            self::redirect('Utilisateur','creerCompte');            
        }else{
            $utilisateur=\APPLI\M\Utilisateur::getInstance()->newItem();
            $utilisateur->email=$params['email'];
            $utilisateur->password=sha1(\Install\App::SALT_BEFORE.$params['password'].\Install\App::SALT_AFTER);
            $utilisateur->store();
            self::redirect('Utilisateur', 'verifIdentification',$params);
        }
        
    }
}
