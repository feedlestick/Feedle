<?php
include('lang.php');

// APP
// chemin vers le dossier app /!\ doit finir par "/" /!\
define('APP','../../app/');

// LIB 
//chemin vers le dossier lib /!\
define('LIB','../../lib/'); 

//ORACLE BDD
//connexion à la base de donnée
define('BDD_HOST','localhost'); //Adresse de connexion
define('BDD_SERVICENAME','XE'); //Nom du service oracle
define('BDD_USER','feedle'); //Nom de l'utilisateur
define('BDD_PWD','feedle'); //Mot de passe de l'utilisateur

//debug
define('DEBUG', true);

if(DEBUG == true)
{
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
	
	//echo 'CODE_000 : Configuration file find</br>';
}
else
{
    ini_set('display_errors', 'Off');
    error_reporting(0);
}