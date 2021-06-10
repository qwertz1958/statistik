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






    // Routing
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


    // Aufrufen der Eingabemaske
    $app->get('/eingabemaske', function (\Slim\Http\Request $request, Slim\Http\Response $response, $args)
    {
        $config = $this->get('config');

        $templateData = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'contentBookInput',
            'ModulName' => 'Buch einlagern',
            'block1' => false,
            'block2' => false,
            'block3' => false
        ];

        $view = $this->view;

        return $this->view->render($response, 'bootstrap.html', $templateData);
    });

    // Abfrage / Eingabe der ISBN
    $app->post('/eingeben', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
        /** @var  $action \App\Action\AssignManagement */
        $action = $this->get(\App\Action\AssignManagement::class);
        $block = $action
            ->bookInput($request, $args)
            ->getblock();


        $config = $this->get('config');

        $templateData = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'contentBookInput',
            'ModulName' => 'Buch einlagern',
            'block1' => $block['block1'],
            'block2' => $block['block2'],
            'block3' => $block['block3'],
            'title' => $block['title'],
            'id' => $block['id']
        ];

        $view = $this->view;

        return $this->view->render($response, 'bootstrap.html', $templateData);


    });

    // Einpflegen der Metadaten eines neuen Buches in den Datenbestand
    $app->any('/einpflegen', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
        /** @var  $action \App\Action\BookDataInput */
        $action = $this->get(\App\Action\BookDataInput::class);
        $block = $action
            ->bookDataInput($request, $args)
            ->getBlock();

        $config = $this->get('config');

        $templateData = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'contentBookInput',
            'ModulName' => 'Buch einlagern',
            'block1' => $block['block1'],
            'block2' => $block['block2'],
            'block3' => $block['block3'],
            'title' => $block['title'],
            'id' => $block['id']
        ];

        $view = $this->view;

        return $this->view->render($response, 'bootstrap.html', $templateData);
    });



    // Kundensuche
    $app->any('/kundensucheErststart', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){

        $config = $this->get('config');

        $templateData = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'contentCustomerSearch',
            'ModulName' => 'Kundensuche',
            'block1' => false,
            'block2' => false
        ];

        $view = $this->view;

        return $this->view->render($response, 'bootstrap.html', $templateData);
    });




    $app->any('/kundensuche', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
        /** @var  $action \App\Action\BlurredCustomerSearch */
        $action = $this->get(\App\Action\BlurredCustomerSearch::class);
        $block = $action
            ->customerSearch($request, $args)
            ->getBlock();

        $config = $this->get('config');

        $templateData = [
            'basisUrl' => $config['basisUrl'],
            'templatename' => 'contentCustomerSearch',
            'ModulName' => 'Kundensuche',
            'block1' => $block['block1'],
            'block2' => $block['block2'],
            'export' => $block['export'],
            'flag' => $block['flag']
        ];

        $view = $this->view;

        return $this->view->render($response, 'bootstrap.html', $templateData);
    });



//Slim fange an zu arbeiten
    $app->run();
}
catch(\Throwable $e){
    $test = 123;
}