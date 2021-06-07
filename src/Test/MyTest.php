<?php
/**
 * testklasse für Container
 *
 * 02.06.2021
 * Kalle
 * MyTest.php
 *
 */

namespace App\Test;
use Webmozart\Assert\Assert;

class MyTest
{
    public function __container($container){

    }

    public function work(\Slim\Http\Request $request, array $args = []){
        try{
            $params = $request->getParams();

            Assert::startsWith($params['aaa'], 'b', $message = 'Beginnt nicht mit : %s');
            return;

        }
        catch(\Throwable $e){
            $test = 123;
        }
    }

    public function myEcho()
    {
        return 'Hallo';
    }
}