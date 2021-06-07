<?php
/**
 * Beschreibung:
 *
 * 07.06.2021
 * Kalle
 * error.php
 *
 */
$container['errorHandler'] = function($container){
    return new \App\Error\CustomErrorHandler($container);
};