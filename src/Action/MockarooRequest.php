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
use App\Model\ModelMockarooRequest;

class MockarooRequest
{
    /** @var OwnLogger */
    protected $logger;
    /** @var ModelMockarooRequest */
    protected $modelMockarooRequest;
    protected $mockarooOutputData;

    public function __construct($container)
    {
        $this->logger = $container[OwnLogger::class];
        $this->modelMockarooRequest = $container[ModelMockarooRequest::class];
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function work()
    {
        try{
            $this->mockarooOutputData = $this->modelMockarooRequest
                ->work()
                ->getMockarooOutputData();

            $this->mockarooOutputData = $this->modelMockarooRequest
                ->convert($this->mockarooOutputData);

            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getMockarooOutputData()
    {
        return $this->mockarooOutputData;
    }
}