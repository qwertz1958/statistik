<?php
/**
 * Beschreibung:
 *
 * 02.06.2021
 * Kalle
 * test.php
 *
 */

$container[\App\Test\MyTest::class] = function($container)
{
    return new App\Test\MyTest($container);
};