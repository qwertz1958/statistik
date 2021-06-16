<?php
/**
 * Beschreibung:
 *
 * 16.06.2021
 * arise
 * MapperMockarooRequest.php
 */


namespace App\Mapper;


use App\Error\CustomErrorHandler;
use App\Logger\OwnLogger;
use Silalahi\Slim\Logger;

class MapperMockarooRequest
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

        }catch (\Throwable $e){
            throw $e;
        }
    }
}