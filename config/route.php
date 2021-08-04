<?php

$app->get('swagger[/]', function ($request, $response, $params)
{
    /** @var $action \App\Swagger */
    $action = $container->get(\App\Swagger::class);
    $response = $action->get($response);

    return $response->withHeader('Content-Type', 'application/json');
});

//$app->get('/users', 'getUsers'); // Using Get HTTP Method and process getUsers function
//$app->get('/users/{id}',    'getUser'); // Using Get HTTP Method and process getUser function
//$app->get('/users/search/{query}', 'findByName'); // Using Get HTTP Method and process findByName function
//$app->post('/users', 'addUser'); // Using Post HTTP Method and process addUser function
//$app->put('/users/{id}', 'updateUser'); // Using Put HTTP Method and process updateUser function
//$app->delete('/users/{id}',    'deleteUser'); // Using Delete HTTP Method and process deleteUser function