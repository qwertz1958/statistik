<?php

// Test
$container[\App\Action\Test::class] = function($container)
{
    return new App\Action\Test($container);
};
