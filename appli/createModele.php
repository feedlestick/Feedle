#!/usr/bin/php
<?php
unset($argv[0]);
foreach ($argv as $nom) {
    echo $nom.PHP_EOL;
    
    $fileTable = './m/' . $nom . '.php';
    $fileTableRow = './m/' . $nom . 'row.php';
    if (!file_exists($fileTable)) {

        $dataTable = '<?php
namespace APPLI\M;

class ' . ucfirst($nom) . ' extends \MVC\Modele {
    protected $_table=\'' . $nom . '\';
    protected $_tableRow=\'\\APPLI\\M\\' . ucfirst($nom) . 'Row\';

}';
        $dataTableRow='<?php

namespace APPLI\M;

class '.ucfirst($nom).'Row extends \MVC\ModeleRow{
}';
        file_put_contents($fileTable, $dataTable);
        file_put_contents($fileTableRow, $dataTableRow);
    }else{
        echo 'ERREUR : Le fichier existe déjà'.PHP_EOL;
    }
}