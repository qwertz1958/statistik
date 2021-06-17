<?php
/**
 * Beschreibung:
 *
 * 21.05.2021
 * Kalle
 * middleware.php
 *
 */

$container[App\Middleware\CheckLogin::class] = function ($container){
    return new App\Middleware\CheckLogin($container);
};