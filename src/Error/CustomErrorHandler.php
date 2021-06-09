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

    public function __construct($container)
    {

    }

    public function __invoke($request, $response, $exception)
    {
        try{
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