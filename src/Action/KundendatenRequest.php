<?php
/**
 * Action zur Route die eine Verbindung zu Mockaroo aufbaut
 *
 * 16.06.2021
 * arise
 * KundendatenRequest.php
 */


namespace App\Action;
use App\Error\CustomErrorHandler;
use App\Logger\OwnLogger;
use App\Model\ModelKundendatenRequest;

class KundendatenRequest
{
    /** @var OwnLogger */
    protected $logger;
    /** @var ModelKundendatenRequest */
    protected $modelKundendatenRequest;
    protected $outputData;

    public function __construct($container)
    {
        $this->logger = $container[OwnLogger::class];
        $this->modelKundendatenRequest = $container[ModelKundendatenRequest::class];
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function work()
    {
        try{
            $this->outputData = $this->modelKundendatenRequest
                ->work()
                ->getOutputData();

            $this->outputData = $this->modelKundendatenRequest
                ->convert($this->outputData);

            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getOutputData()
    {
        return $this->outputData;
    }
}