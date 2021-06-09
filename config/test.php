<?php
/**
 * Test des Containers mit und ohne 'factory'
 *
 * 02.06.2021
 * Kalle
 * test.php
 *
 */

//$container[\App\Test\ContainerTest::class] = function($container)
//{
//    return new App\Test\ContainerTest($container);
//};


$container[\App\Test\ContainerTest::class] = $container->factory(function($container)
{
    return new App\Test\ContainerTest($container);
});