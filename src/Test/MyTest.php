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
        $params = $request->getParams();
        $uri = $request->getUri();
        $isDelete = $request->isDelete();
        $test = 123;
    }


}