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
    // Konfiguration Twig
    include_once ('../config/twig.php');

    // Slim Framework
    $app = new \Slim\App($container);
    // Routing
    // Aufrufen der Eingabemaske
    $app->any('/eingabemaske', function ($request, $response, $args){
        /** @var  $action \App\Action\AssignManagement */
        $action = $this->get(\App\Action\AssignManagement::class);
        $action->eingabemaske();
        return $response;
    });

    // Abfrage / Eingabe der ISBN
    $app->post('/eingeben', function ($request, $response, $args){
        /** @var  $action \App\Action\AssignManagement */
        $action = $this->get(\App\Action\AssignManagement::class);
        $action->bookInput($request, $args);
        return $response;
    });

    // Respnse Html
    $app->get('/html/{name}', function(\Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        $test = 123;

        $view = $this->view;

        return $this->view->render($response, 'html.html',  [
            'name' => $args['name']
        ]);
    });

    // primitiver text response
    $app->get('/text', function(\Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        $body = $response->getBody();
        $body->write('Hello');

        return $response;
    });





    // Slim fange an zu arbeiten
    $app->run();
}catch(\Throwable $e){
    $test = 123;
}





?>
