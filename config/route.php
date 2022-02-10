<?php

// mevdschee
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;
use Tqdev\PhpCrudApi\ResponseFactory;

/*** Standard - Routen ***/

// Start Template
$app->get('/', function(Slim\Http\Request $request,Slim\Http\Response $response, array $args)
{
    return $this->response->withStatus(301)->withHeader('Location', '/view/home');
});

// Views
$app->get('/view/{template}', function($request, $response, array $args)
{
    $subTemplate = $args["template"];

    if(!file_exists('./template/' . $subTemplate . '.html'))
        $subTemplate = 'home';

    $templateData = [
        'subTemplate' => $subTemplate,
        'navigation' => $this->get('navigation')
    ];

    return $this->view->render($response, 'layout.html', $templateData);
});

// API mevdschee
$app->any('/api[/{params:.*}]', function(Slim\Http\Request $request,Slim\Http\Response $response, array $args)
{
    $allowedTables = 'baumkataster, kataster, anzahlBaeume';

    if(strstr($args['params'], 'records'))
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
            'tables' => $allowedTables,
            'middlewares' => 'customization,authorization',
            'customization.afterHandler' => function ($operation, $tableName, $response, $environment) {
                $json = json_decode($response->getBody()->getContents());

                return ResponseFactory::fromObject(200, $json->records);
            },
            'authorization.tableHandler' => function ($operation, $tableName)
            {
                return in_array($operation, array('list','read','document'));     
            },
        ]);
    }
    else
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
            'tables' => $allowedTables,
            'middlewares' => 'authorization',
            'authorization.tableHandler' => function ($operation, $tableName)
            {
                return in_array($operation, array('list','read','document'));
                 
                // return true; 
            },
        ]);
    }
    
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