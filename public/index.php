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
//Settings/ einstellungen Slim framework
    $configSlim = '';
    include_once ('../config/configSlim.php');

//Slim Framework initialisieren
    $app = new \Slim\App($configSlim);
    $container = $app->getContainer();

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
    // Error handling
    include_once ('../config/error.php');

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

    $app->get('/kundensucheErststart',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        $params = $request->getParams();

        /** @var  \App\Test\MyTest */
        $action = $this->get(Blu);
        $action->work($args, $params);
        $templateData = $action->getTemplateData();

        $view = $this->view;

        return $this->view->render($response, 'layout.phtml', $templateData);

    });

    $app->any('/erststartArtikelSuche',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        /** @var  \App\Action\ExistsArticleInStore */
        $action = $this->get(\App\Action\ExistsArticleInStore::class);
        $action->erststart($request, $args);

        return $response;
    });

    $app->any('/abrufen',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        /** @var  \App\Action\ExistsArticleInStore */
        $action = $this->get(\App\Action\ExistsArticleInStore::class);
        $action->bookOutput($request, $args);

        return $response;
    });



    $app->any('/buchTitelSuche',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        /** @var  \App\Action\BlurrdBookTitleSearch */
        $action = $this->get(\App\Action\BlurrdBookTitleSearch::class);
        $action->booklook($request, $args);

        return $response;
    });

    $app->any('/buchTitelSucheStart',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        /** @var  \App\Action\BlurrdBookTitleSearch */
        $action = $this->get(\App\Action\BlurrdBookTitleSearch::class);
        $action->bookTitleSearchStart($request, $args);

        return $response;
    });

    $app->get('/error', function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
     throw new Exception('ein Fehler');
    });


    //Slim fange an zu arbeiten
    $app->run();
}
catch(\Throwable $e){
    $test = 123;
}