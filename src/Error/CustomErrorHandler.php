<?php
/**
 * Beschreibung:
 *
 * 07.06.2021
 * Kalle
 * CustomErrorHandler.php
 *
 */


namespace App\Error;


use App\Test\MyTest;

class CustomErrorHandler
{
    protected $myTest;

    public function __construct($container)
    {
        $this->myTest = $container[\App\Test\MyTest::class];
    }

    public function __invoke($request, $response, $exception)
    {
        try{
            $test = 123;

            /** @var  $myTest MyTest */
            $myTest = $this->myTest;
            $echo = $myTest->myEcho();

            return $response
                ->withStatus(500)
                ->withHeader('Content-Type', 'text/html')
                ->write('Ein fehler ist augetreten !');
        }
        catch(\Throwable $e){
            throw $e;
        }
    }
}