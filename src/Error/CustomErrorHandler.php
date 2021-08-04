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
use App\ErrorCodes;

class CustomErrorHandler
{
    /** @var OwnLogger */
    protected $logger;

    public function __construct($container)
    {
        $this->logger = $container[OwnLogger::class];
    }

    public function __invoke($request, $response,\Throwable $exception)
    {
        try{
            $completeErrorMessage = $exception->getFile() . ' : ' . $exception->getLine() . "\n >>" . $exception->getMessage() . ' : ' . $exception->getCode() . "\n" . $exception->getTraceAsString();

            $this->logger
                ->error($completeErrorMessage);

            $errorStatus = ErrorCodes::getErrorStatusStatic($exception->getCode());

            return $response
                ->withStatus($errorStatus)
                ->withHeader('Content-Type', 'text/html')
                ->write('Error: ' . $exception->getMessage());
        }
        catch(\Throwable $e){
            throw $e;
        }
    }
}