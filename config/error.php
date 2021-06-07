<?php
/**
 * Error Handler
 *
 * 07.06.2021
 * arise
 * error.php
 */

$container['errorHandler'] = function ($container){
    return new \App\Error\CustomErrorHandler($container);
};