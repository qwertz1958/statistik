<?php

// Twig
// $container[\Twig\Environment::class] = function ($container)
// {
//     $pathToTwigTemplate = __DIR__;
//     $pathToTwigTemplate .= '\\..\\public\\template';
//     $pathToTwigTemplate = realpath($pathToTwigTemplate);

//     $loader = new \Twig\Loader\FilesystemLoader($pathToTwigTemplate);

//     $twig = new \Twig\Environment($loader, [
//         'cache' => false,
//     ]);

//     return $twig;
// };

// Standard Route Errors
$container[\App\ErrorCodes::class] = function()
{
    return new App\ErrorCodes();
};