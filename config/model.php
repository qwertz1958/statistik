<?php
/**
 * allgemeine Modelle
 *
 * 12.05.2021
 * dominik.schmidt
 */



$container[\App\Model\FindArticle::class] = function ($container) {
    return new \App\Model\FindArticle($container);
};

$container[\App\Model\SteuerungApplikation::class] = function($container){
    return new \App\Model\SteuerungApplikation($container);
};

$container[\App\Model\BookDataControl::class] = function ($container){
    return new \App\Model\BookDataControl($container);
};

$container[\App\Model\CustomerSearchControl::class] = function($container)
{
    return new \App\Model\CustomerSearchControl($container);
};
$container[\App\Model\FindBookTitle::class] = function ($container){
    return new \App\Model\FindBookTitle($container);
};

$container[\App\Model\LoginControl::class] = function($container){
    return new \App\Model\LoginControl($container);
};