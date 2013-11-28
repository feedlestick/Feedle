<?php

session_start();

$_SESSION['messages']=array('danger'=>array(),'info'=>array(),'success'=>array());
if(isset($_SESSION['utilisateur']) and is_string($_SESSION['utilisateur'])){
    Install\App::$utilisateur=  unserialize($_SESSION['utilisateur']);
}

function __autoload($class) {
    $chemins = explode('\\', strtolower($class));
    switch ($chemins[0]) {
        case 'install':
            $fichier = INSTALL . $chemins[1] . '.php';
            break;
        case 'mvc':
            $fichier = MVC . $chemins[1] . '.php';
            break;
        default:
            $fichier = \Install\Chemins::ROOT . implode('/', $chemins) . '.php';
    }
    if(file_exists($fichier)){
        include $fichier;
    }else{
        var_dump($fichier);
        var_dump($class);
        
    }
}


$c=\MVC\A::post('c',  \Install\App::C);
$a=\MVC\A::post('a',\Install\App::A);
$controleurNom=  '\APPLI\\C\\'.$c;


\MVC\Controleur::setVue(new \MVC\Vue($c,$a));

$controleurNom::$a(\MVC\A::getParams());
 

$controleurNom::getVue()->display();
 
 