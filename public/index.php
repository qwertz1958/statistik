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
use Spatie\ArrayToXml\ArrayToXml;

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
    $app->any('/eingabemaske', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
        $view = $this->view;

        return $this->view->render($response, 'layout.phtml',  [
            'basisUrl' => 'localhost/praktikum/warenwirtschaftng/public/'
        ]);
    });

    // Abfrage / Eingabe der ISBN
    $app->any('/eingeben', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
        /** @var  $action \App\Action\AssignManagement */
        $action = $this->get(\App\Action\AssignManagement::class);
        $action->bookInput($request, $args);
        return $response;
    });

    // Einpflegen der Metadaten eines neuen Buches in den Datenbestand
    $app->any('/einpflegen', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
        /** @var  $action \App\Action\BookDataInput */
        $action = $this->get(\App\Action\BookDataInput::class);
        $action->bookDataInput($request, $args);
        return $response;
    });



    // Kundensuche
    $app->any('/kundensucheErststart', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
        $view = $this->view;

        return $this->view->render($response, 'layout.phtml',  [
            'basisUrl' => 'localhost/praktikum/warenwirtschaftng/public/'
        ]);
    });


    $app->any('/kundensuche', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
        /** @var  $action \App\Action\BlurredCustomerSearch */
        $action = $this->get(\App\Action\BlurredCustomerSearch::class);
        $action->customerSearch($request, $args);
        return $response;
    });



















    // Response Json
    $app->get('/xml/{name}', function(\Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        $kunden = [];
        $kunden[0]['name'] = 'Mustermann';
        $kunden[1]['name'] = 'Sonnenschein';
        $kunden[0]['vorname'] = 'Max';
        $kunden[1]['vorname'] = 'Susi';

        /** @var  $xml ArrayToXml */
        $xml = ArrayToXml::convert(['kunde' => $kunden], 'doener');

        /** @var  $newResponse \Slim\Http\Response */
        $newResponse = $response->withHeader('Content-Type', 'text/xml');
        $body = $newResponse->getBody();
        $body->write($xml);

        return $newResponse;
    });

    // Response Json
    $app->get('/json/{name}', function(\Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        $user = [];
        $user[0]['name'] = 'Mustermann';
        $user[1]['name'] = 'Sonnenschein';
        $user[0]['vorname'] = 'Max';
        $user[1]['vorname'] = 'Susi';

        $newResponse = $response->withJson($user);

        return $newResponse;
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
