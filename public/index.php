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

use Spatie\ArrayToXml\ArrayToXml;


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

    $app->get('/json[/{name}]',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {

        $user = [];

        $user[0]['name'] = 'Mustermann';
        $user[1]['name'] = 'Sonnenschein';
        $user[2]['vorname'] = 'Max';
        $user[3]['vorname'] = 'Susi';


    $newResponse = $response->withJson($user);


        return $newResponse;

    });

    //XML response
    $app->get('/xml',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        $kunden = [];
        $kunden[0]['name'] = 'Mustermann';
        $kunden[1]['name'] = 'Sonnenschein';
        $kunden[0]['vorname'] = 'Max';
        $kunden[1]['vorname'] = 'Susi';

        /** @var  ArrayToXml */
        $xml = ArrayToXml::convert(['kunde' => $kunden], 'kunden');

        $newresponse = $response->withHeader('Content-type', 'text/xml');
        $body = $newresponse->getBody();
        $body->write($xml);

        return $newresponse;

    });

    //Slim fange an zu arbeiten
    $app->run();

}
catch(\Throwable $e){
    $test = 123;
}