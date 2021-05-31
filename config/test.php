<?php

$container[App\Test\MyTest::class] = function ($container){
    return new App\Test\MyTest($container);
};


