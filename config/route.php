<?php

// Standard - Routen

$app->get('/swagger[/]', function ($request, $response, $args)
{
    /** @var $swagger App\Swagger */
    $swagger = $this->get(\App\Swagger::class);
    $response = $swagger->get($response);

    return $response->withHeader('Content-Type', 'application/json');
});

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