<?php
/**
 * Beschreibung:
 *
 * 16.01.2022
 * Stephan Krauss
 * error.php
 *
 */
$container['errorHandler'] = function($container){
    return new \App\Error\CustomErrorHandler($container);
};

$c['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $response->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Page not found');
    };
};