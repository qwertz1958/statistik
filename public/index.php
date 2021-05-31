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

$app = new \Slim\App();

// Route
$app->get('/', function ($request, $response, $args){
    $response->write('Welcome to Slim crash course from FrontendTips');
});

// Json rückgabe
$countries = array(
    array('name' => 'USA'),
    array('name' => 'Germany'),
    array('name' => 'Poland'),
    array('name' => 'Usbekistan')
);

$app->get('/countries', function($request, $response, $args) use ($countries){
    return $response->withJson($countries);
});

$app->run();

?>
