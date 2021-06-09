<?php
/**
 * Beschreibung:
 *
 * 04.06.2021
 * Kalle
 * twig.php
 *
 */
$container['view'] = function ($container)
{
    $pathToTemplate = realpath('../public/template');

    $view = new \Slim\Views\Twig($pathToTemplate, [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};