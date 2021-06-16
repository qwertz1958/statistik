<?php
/**
 * Verbindung zu externen Datenquellen
 *
 * 12.05.2021
 * dominik.schmidt
 */

$container[\App\Mapper\PitchInfo::class] = function($container){
    return new \App\Mapper\PitchInfo($container);
};

$container[\App\Mapper\IsbnRequest::class] = function ($container){
    return new \App\Mapper\IsbnRequest($container);
};

$container[\App\Mapper\IsbnInput::class] = function ($container){
    return new \App\Mapper\IsbnInput($container);
};

$container[\App\Mapper\MapperBookDataInput::class] = function($container){
    return new \App\Mapper\MapperBookDataInput($container);
};

$container[\App\Mapper\MapperCustomerSearch::class] = function ($container){
    return new \App\Mapper\MapperCustomerSearch($container);
};
$container[\App\Mapper\BookTitleInfo::class] = function($container){
    return new \App\Mapper\BookTitleInfo($container);
};

$container[\App\Mapper\MapperKundendatenRequest::class] = function ($container){
    return new \App\Mapper\MapperKundendatenRequest($container);
};
