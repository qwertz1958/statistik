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