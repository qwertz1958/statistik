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


use App\Logger\OwnLogger;
use App\Test\MyTest;

class CustomErrorHandler
{
    /** @var OwnLogger */
    protected $logger;

    public function __construct($container)
    {
        $this->logger = $container[OwnLogger::class];
    }

    public function __invoke($request, $response, $exception)
    {
        try{
            $errorMessage = $exception->getFile() . ' : ' . $exception->getLine() . "\n >>" . $exception->getMessage() . ' : ' . $exception->getCode() . "\n" . $exception->getTraceAsString();


            $this->logger
                ->error($errorMessage);

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