<?php
/**
 * Bootstrap Datei WarenwirtschaftNG
 *
 * 02.06.2021
 * Kalle
 * index.php
 *
 */
include_once ("../vendor/autoload.php");


try{
    //Container
    $container = new \Slim\Container();

    include_once ('../config/test.php');

    include_once ('../config/twig.php');

    //slim framework
    $app = new \Slim\App($container);





    /** @var \App\Test\MyTest $testKlasse */
//    $testKlasse = $container[\App\Test\MyTest::class];
//    $hallo = $testKlasse->work();

    // Routing
    $app->map(['GET', 'POST'], '/name/[{name}]', function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        $test =123;

        $action = $this->get(\App\Test\MyTest::class);
        $action->work($request, $args);

        return $response;
    });

    $app->get('/text',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {

        //primitiver text response

        $body = $response->getBody();
        $body->write('Hello');

        return $response;

    });

    $app->get('/html/{name}',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {

        $test = 123;

        $view = $this->view;



        return $this->view->render($response, 'html.html', ['name'=> $args['name']]);

    });

    //Slim fange an zu arbeiten
    $app->run();

}
catch(\Throwable $e){
    $test = 123;
}