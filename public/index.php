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
    // Slim Framework
    $app = new \Slim\App($container);
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



    // muss aufgeräumt werden
    // if(strpos($_SERVER['REQUEST_URI'], '/name') == false)
    //    $_SERVER['REQUEST_URI'] = $container['config']['basisUrl'];

    $app->any('/', function ($request, $response, $args)
    {
        $action = $this->get(\App\Test\MyTest::class );
        $action->work($request, $args);
        return $response;
    });

    $app->post('/name[/{name}]', function(\Slim\Http\Request $request, \Slim\Http\Response $response,array $args)
    {
        /** @var  $action \App\Test\MyTest */
        $action = $this->get(\App\Test\MyTest::class );
        $action->work($request, $args);
        return $response;
    });

    $app->any('/bla/{bla}/blub/{blub}', function ($request, $response, $args)
    {
        /** @var  $action \App\Test\MyTest */
        $action = $this->get(\App\Test\MyTest::class );
        $action->work($request, $args);

        return $response;
    });

    // Any Route (es ist egal mit welcher Methode übergeben wird)
    $app->any('/books/[{id}]', function ($request, $response, $args) {
        $test = 123;

        return $response;
    });

    $app->map(['GET', 'POST'], '/auto', function ($request, $response, $args) {
        $test = 123;

        return $response;
    });




    // Slim fange an zu arbeiten
    $app->run();
}catch(\Throwable $e){
    $test = 123;
}





?>
