<?php
/**
 * externe Klassen
 *
 * 12.05.2021
 * dominik.schmidt
 */

$container[GrumpyPdo::class] = function ($container){
    return new GrumpyPdo(
        $container['config']['database']['db_server'],
        $container['config']['database']['db_user'],
        $container['config']['database']['db_password'],
        $container['config']['database']['db_database']);
};

// Logger
$container[\App\Logger\OwnLogger::class] = function ($container){
    $settings = [];
    $settings['path'] = realpath('./../../log/');
    $settings['message_format'] = '[%label%] %date% >> %message%';

    return new \App\Logger\OwnLogger($settings);
};

//Array to XML
$container[\Spatie\ArrayToXml\ArrayToXml::class] = function (){
    return new \Spatie\ArrayToXml\ArrayToXml($array = []);
};

// Twig
$container[\Twig\Environment::class] = function ($container)
{
    $pathToTwigTemplate = __DIR__;
    $pathToTwigTemplate .= '\\..\\public\\template';
    $pathToTwigTemplate = realpath($pathToTwigTemplate);

    $loader = new \Twig\Loader\FilesystemLoader($pathToTwigTemplate);

    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

    return $twig;
};

// Swagger Standard Route
$container[\App\Swagger::class] = function($container)
{
    return new App\Swagger();
};

// Standard Route Errors
$container[\App\ErrorCodes::class] = function()
{
    return new App\ErrorCodes();
};