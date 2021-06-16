<?php
/**
 * Modell zur Route die eine Verbindung zu Mockaroo aufbaut
 *
 * 16.06.2021
 * arise
 * ModelKundendatenRequest.php
 */


namespace App\Model;
use App\Logger\OwnLogger;
use App\Mapper\MapperKundendatenRequest;
use App\Tool\XmlConvert;

class ModelKundendatenRequest
{
    use XmlConvert;
    /** @var OwnLogger */
    protected $logger;
    /** @var MapperKundendatenRequest */
    protected $mapperKundendatenRequest;
    protected $outputData;

    public function __construct($container)
    {
        $this->logger = $container[OwnLogger::class];
        $this->mapperKundendatenRequest = $container[MapperKundendatenRequest::class];
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function work()
    {
        try{
            $this->outputData = $this->mapperKundendatenRequest
                ->work()
                ->getData();

            return $this;
        }catch (\Throwable $e){
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