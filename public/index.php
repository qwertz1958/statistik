<?php
/**
 * Bootstrap Datei WarenwirtschaftNG
 *
 * 02.06.2021
 * Kalle
 * index.php
 *
 */

session_start();

include_once ("../vendor/autoload.php");

use Spatie\ArrayToXml\ArrayToXml;
use Logger\Logger;


try{

//Einstellungen Slim framework
    $configSlim = '';
    include_once ('../config/configSlim.php');

//Slim Framework initialisieren
    $app = new \Slim\App($configSlim);
    $container = $app->getContainer();

// Konfiguration Container
    $config = '';
    include_once ('../config/global.php');
    $container['config'] = $config;

// Konfiguration der Tools
    include_once ('../config/tool.php');
// Konfiguration des Mappers
    include_once ('../config/mapper.php');
// Konfiguration des Models
    include_once ('../config/model.php');
// Konfiguration der Action
    include_once ('../config/action.php');
// allgemeine Klassen
    include_once ('../config/src.php');
// Konfiguration Twig
    include_once ('../config/twig.php');
// Error handling
    include_once ('../config/error.php');
    // Middleware handling
    include_once ('../config/middleware.php');


    // Todo: Middleware , $_SESSION['kundenId'] = 25;
    // Die Url wird zerlegt und darauf geprüft ob sich das wort login darin befindet
    // Falls sich das Wort login darin befindet soll man auf die login seite weitergeleitet werden
    // Falls sich das Wort login nicht darin befindet soll der LoginChecker anspringen úm zu überprüfen

//    $test = explode('/', $_SESSION['url']);
//    if(!in_array('login', $test))
//        $app->add($container[\App\Middleware\CheckLogin::class]);

// Routing
    include_once('../config/route.php');

//Slim fange an zu arbeiten
    $app->run();
}
catch(\Throwable $e){
    throw $e;
}