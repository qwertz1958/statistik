<?php


namespace App\Test;


use Slim\Http\Request;

class MyTest
{
    protected $config;

    public function __construct($container){
        $this->config = $container['config'];
    }

    public function work(Request $request, array $args){
        $test = 123;
    }


}