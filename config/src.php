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


// Array to XML
$container[\Spatie\ArrayToXml\ArrayToXml::class] = function (){
    return new \Spatie\ArrayToXml\ArrayToXml(
        $array = []
    );
};


// TwigTest Framework
$container[\Twig\Environment::class] = function ($container){
    $pathToTwigTempalte = __DIR__;
    $pathToTwigTempalte .= '\..\public\template';
    $pathToTwigTempalte = realpath($pathToTwigTempalte);

    $loader = new \Twig\Loader\FilesystemLoader($pathToTwigTempalte);
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

    return $twig;
};