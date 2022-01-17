<?php

// mevdschee
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;

/*** Standard - Routen ***/

// Start Template
$app->get('/', function(Slim\Http\Request $request,Slim\Http\Response $response, array $args)
{
    $response->getBody()->write('Hallo Welt!');

    return $response;
});

// API mevdschee
$app->any('/api[/{params:.*}]', function(Slim\Http\Request $request,Slim\Http\Response $response, array $args)
{
    $test = 123;

    $config = new Config([
        'username' => $_ENV['PHP_CRUD_API_USERNAME'],
        'password' => $_ENV['PHP_CRUD_API_PASSWORD'],
        'database' => $_ENV['PHP_CRUD_API_DATABASE'],
        'basePath' => '/api',
        'debug' => $_ENV['PHP_CRUD_API_DEBUG'],
        'driver' => $_ENV['PHP_CRUD_API_DRIVER'],
        'address' => $_ENV['PHP_CRUD_API_ADDRESS'],
        'port' => $_ENV['PHP_CRUD_API_PORT']
    ]);

    $api = new Api($config);
    $response = $api->handle($request);

    return $response;
});


$app->get('/view/{template}', function($request, $response, array $args)
{
    $templateData = [
        'bla' => 'bla',
        'blub' => 'blub'
    ];

    return $this->view->render($response, 'layout.tpl', $templateData);
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