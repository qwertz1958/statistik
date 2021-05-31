<?php
/**
 * Bootstrap Datei
 *
 * 310.05.2021
 * dominik.schmidt
 * index.php
 */

// Autoloader
include_once ('../vendor/autoload.php');

try{
    $container = new \Slim\Container();
    $app = new \Slim\App();
    // $container = $app->getContainer();

    // Konfiguration Container
    $config = '';
    include_once ('../config/global.php');
    $container['config'] = $config;

    include_once ('../config/test.php');
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

    /** @var  \App\Test\MyTest */
    $testContainer = $container[App\Test\MyTest::class];
    $testContainer->work();



}catch(\Throwable $e){
    $test = 123;
}



$app->run();

?>
