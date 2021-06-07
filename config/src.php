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

$container['GrumpyPdoTaskboard'] = function ($container){
    return new GrumpyPdo(
        $container['config']['database_taskboard']['db_server'],
        $container['config']['database_taskboard']['db_user'],
        $container['config']['database_taskboard']['db_password'],
        $container['config']['database_taskboard']['db_database']);
};

$container[\App\Pimple::class] = function ($container){
    return new \App\Pimple($container);
};


$container[\App\Logger::class] = function ($container){
    return new \App\Logger($container);
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