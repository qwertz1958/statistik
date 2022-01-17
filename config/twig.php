<?php
/**
 * Konfiguration Twig View
 *
 * 16.01.2022
 * Stephan Krauss
 * twig.php
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

    // debuging Twig
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    // Enviroment
    $enviroment = $view->getEnvironment();
    $enviroment->addGlobal('session', $_SESSION);

    return $view;
};