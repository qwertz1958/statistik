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

//Startseite der Artikelsuche
    $app->get('/erststartArtikelSuche',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        $config = $this->get('config');

        $templateData = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'pitchInfo',
            'ModulName' => 'Suche nach ISBN:',
            'block1' => false,
            'block2' => false

        ];

        return $this->view->render($response, 'bootstrap.html', $templateData);
    });

// Verarbeitung und Ausgabe der Artikelsuche
    $app->post('/abrufen',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        /** @var  \App\Action\ExistsArticleInStore */
        $action = $this->get(\App\Action\ExistsArticleInStore::class);
        $templateData = $action->bookOutput($request);


        $templateData['templatename'] = 'pitchInfo';
        $templateData['ModulName'] = 'Stellpatzinformation';

        return $this->view->render($response, 'bootstrap.html', $templateData);
    });


//Verarbeitung und Ausgabe der Buchtitelsuche
    $app->post('/buchTitelSuche',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        /** @var  \App\Action\BlurrdBookTitleSearch */
        $action = $this->get(\App\Action\BlurrdBookTitleSearch::class);
        $templateData = $action->booklook($request);

        return $this->view->render($response, 'bootstrap.html', $templateData);
    });

//Startseite der Buchtitelsuche
    $app->get('/buchTitelSucheStart',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
 //       /** @var  \App\Action\BlurrdBookTitleSearch */
//        $action = $this->get(\App\Action\BlurrdBookTitleSearch::class);
//        $action->bookTitleSearchStart($request, $args);

        $config = $this->get('config');

        $templateData = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'contentBookTitleSearch',
            'ModulName' => 'Suche nach Buchtitel:',
            'block1' => false,
            'block2' => false

        ];

        return $this->view->render($response, 'bootstrap.html', $templateData);

    });

//Errorhandler
    $app->get('/error', function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
     throw new Exception('ein Fehler');
    });

// Response Twig-Html Template , Kontrollstrukturen
    $app->get('/template[/{templatename}]', function (\Slim\Http\Request $request, Slim\Http\Response $response, $args)
    {
        $kunde = [];
        $kunde[0]['name'] = 'Mustermann';
        $kunde[1]['name'] = 'Sonnenschein';
        $kunde[0]['vorname'] = 'Max';
        $kunde[1]['vorname'] = 'Susi';

        $config = $this->get('config');

        $template = [
            'basisUrl' => $config['basisUrl'],
            'kunde' => $kunde,
            'templatename' => $args['templatename'],
            'start' => true,
            'mini' => true
        ];

        $view = $this->view;

        return $this->view->render($response, 'bootstrap.html', $template);
    });

// Response Twig-Html Template , Schleifen
    $app->get('/template1/loop', function (\Slim\Http\Request $request, Slim\Http\Response $response, $args)
    {
        $kunden = [];
        $kunden[0]['name'] = 'Mustermann';
        $kunden[1]['name'] = 'Sonnenschein';
        $kunden[0]['vorname'] = 'Max';
        $kunden[1]['vorname'] = 'Susi';

        $config = $this->get('config');

        $template = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'loop',
            'kunden' => $kunden
        ];

        $view = $this->view;

        return $this->view->render($response, 'bootstrap.html', $template);
    });

// Startseite
    $app->get('/',  function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {

        $config = $this->get('config');

        $templateData = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'leer',
        //    'ModulName' => 'Schön, daß Sie da sind!'

        ];

        return $this->view->render($response, 'bootstrap.html', $templateData);

    });


//Slim fange an zu arbeiten
    $app->run();
}
catch(\Throwable $e){
    $test = 123;
}