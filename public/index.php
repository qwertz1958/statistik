<?php
/**
 * Bootstrap Datei Map
 *
 * 17.01.2022
 * Stephan Krauss
 * index.php
 *
 */

// phpinfo();
// xdebug_info();
// exit();


session_start();

include_once ("../vendor/autoload.php");

// use Spatie\ArrayToXml\ArrayToXml;
// use Logger\Logger;


try{

//Einstellungen Slim framework
    $configSlim = '';
    include_once ('../config/configSlim.php');

//Slim Framework initialisieren
    $app = new \Slim\App($configSlim);
    $container = $app->getContainer();

// Konfiguration Container
    include_once ('../config/global.php');

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

// Navigation
include_once('../config/navigation.php');     

// Routing
    include_once('../config/route.php');

//Slim fange an zu arbeiten
    $app->run();
}
catch(\Throwable $e){
    throw $e;
}