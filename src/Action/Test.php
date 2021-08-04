<?php


namespace App\Action;


use Slim\App;
use App\ErrorCodes;
use App\Logger\OwnLogger;

class Test
{
    /** @var mixed OwnLogger */
    protected $logger;

    public function __construct($container)
    {
        $this->logger = $container[\App\Logger\OwnLogger::class];
    }

    public function __invoke($request, $response, $args)
    {
        try{
            $this->logger->write('wichtiger Hinweis',3);

            throw new \Exception('FILE_ALREDY_EXIST', ErrorCodes::getErrorCodeStatic('FILE_ALREDY_EXIST'));

            return $this;
        }
        catch(\Throwable $e){
            throw $e;
        }
    }

}