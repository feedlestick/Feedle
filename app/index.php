<?php
namespace APP;

session_start();

/*
function __autoload($class) {
    $fichier = LIB . $class . '.php';
    include($fichier);
}*/

include(LIB.'a'.'.php');
include(LIB.'vue'.'.php');
include(LIB.'controleur.php');
include(APP.'c/index.php');


//if(DEBUG) echo 'CODE_000 : APP define is correct</br>';

$cVue = \LIB\A::get('c', 'Index');
$c = \LIB\A::get('c', 'Index');
$a = \LIB\A::get('a', 'index');

$vue=new \LIB\Vue($cVue,$a);

$c = $c

$controleur = new $c($vue);

$controleur->$a();
$vue->display();

/*
if(Account::estConnecte())
{
    $cVue=MVC_A::get('c', 'Accueil');
    $c = 'ROOT_C_' . MVC_A::get('c', 'Accueil');
    $a = MVC_A::get('a', 'listeArticles');
}
else
{
    $cVue = 'Account';
    $c = 'ROOT_C_' . 'Account';
    $a = MVC_A::get('a', 'loginForm');
}


$vue=new MVC_Vue($cVue,$a);
$controleur = new $c($vue);

$controleur->$a();
$vue->display();
*/
