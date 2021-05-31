<?php


namespace App\Test;


class MyTest
{
    protected $config;

    public function __construct($container){
        $this->config = $container['config'];
    }

    public function work(){
        return 'hallo';
    }


}