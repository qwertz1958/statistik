<?php
/**
 * Action zur Route die eine Verbindung zu Mockaroo aufbaut
 *
 * 16.06.2021
 * arise
 * MockarooRequest.php
 */


namespace App\Action;


use App\Error\CustomErrorHandler;
use App\Logger\OwnLogger;

class MockarooRequest
{
    /** @var OwnLogger */
    protected $logger;
    /** @var CustomErrorHandler */
    protected $errorHandler;

    public function __construct($container)
    {
        $this->logger = $container[OwnLogger::class];
        $this->errorHandler = $container[CustomErrorHandler::class];
    }

    public function work()
    {
        try{

        }catch(\Throwable $e){
            throw $e;
        }
    }
}