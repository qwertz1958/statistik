<?php


namespace App\Test;


use Slim\Http\Request;
use Webmozart\Assert\Assert;

class MyTest
{
    protected $config;

    public function __construct($container){
        $this->config = $container['config'];
    }

    public function work(Request $request, array $args){
        try{
            $args['blub'] = (int)$args['blub'];
            Assert::string($args['bla'], 'Der Parameter soll nicht vom Typ: %s sein');
            Assert::length($args['bla'], 3, $message = 'Fehler');
            Assert::startsWith($args['bla'], "a", $message = 'String is not starting with %s');
            Assert::notStartsWith($args['bla'], "a", $message = 'String should not start with %s');

            $test = 123;
        }catch (\Throwable $e){
            throw $e;
        }

    }


}