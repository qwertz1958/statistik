<?php
/**
 * Beschreibung:
 *
 * 09.06.2021
 * arise
 * test.php
 */

//$container[App\Test\ContainerTest::class] = function ($container)
//{
//    return new App\Test\ContainerTest($container);
//};

$container[\App\Test\MyTest::class] = $container->factory(function($container)
{
   return new App\Test\MyTest($container);
});