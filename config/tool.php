<?php
/**
 *
 *
 * 12.05.2021
 * dominik.schmidt
 */


$container[\App\Tool\XmlConvert::class] = function ($container){
    return new XmlConvert($container);
};
