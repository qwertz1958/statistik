<?php

// mevdschee
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;

/*** Standard - Routen ***/

// Start Template
$app->get('/', function(Slim\Http\Request $request,Slim\Http\Response $response, array $args)
{
    $templateData = [
        'subTemplate' => 'home'
    ];

    return $this->view->render($response, 'layout.tpl', $templateData);
});

// Views
$app->get('/view/{template}', function($request, $response, array $args)
{
    $subTemplate = $args["template"];

    if(!file_exists('./template/' . $subTemplate . '.tpl'))
        $subTemplate = 'home';

    $templateData = [
        'subTemplate' => $subTemplate
    ];

    return $this->view->render($response, 'layout.tpl', $templateData);
});

// API mevdschee
$app->any('/api[/{params:.*}]', function(Slim\Http\Request $request,Slim\Http\Response $response, array $args)
{
    $config = new Config([
        'username' => $_ENV['PHP_CRUD_API_USERNAME'],
        'password' => $_ENV['PHP_CRUD_API_PASSWORD'],
        'database' => $_ENV['PHP_CRUD_API_DATABASE'],
        'basePath' => '/api',
        'debug' => $_ENV['PHP_CRUD_API_DEBUG'],
        'driver' => $_ENV['PHP_CRUD_API_DRIVER'],
        'address' => $_ENV['PHP_CRUD_API_ADDRESS'],
        'port' => $_ENV['PHP_CRUD_API_PORT'],
        'customControllers' => 'App\Action\Zusatz',
        'tables' => 'baumkataster,kataster'
    ]);

    $api = new Api($config);
    $response = $api->handle($request);

    return $response;
});


// darstellen der bekannten Fehler
$app->get('/errors[/]', function ($request, $response, $args)
{
    /** @var $errorCodes App\ErrorCodes */
    $errorCodes = $this->get(\App\ErrorCodes::class);
    $errors = $errorCodes->getAllErrorCodeAsJson();

    $response->getBody()->write($errors);

    return $response->withHeader('Content-Type', 'application/json');;
});

// Test Route
$app->get('/test/{bla}', \App\Action\Test::class);