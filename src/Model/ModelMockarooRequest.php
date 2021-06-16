<?php
/**
 * Modell zur Route die eine Verbindung zu Mockaroo aufbaut
 *
 * 16.06.2021
 * arise
 * ModelMockarooRequest.php
 */


namespace App\Model;
use App\Logger\OwnLogger;
use App\Mapper\MapperMockarooRequest;
use App\Tool\XmlConvert;

class ModelMockarooRequest
{
    use XmlConvert;
    /** @var OwnLogger */
    protected $logger;
    /** @var MapperMockarooRequest */
    protected $mapperMockarooRequest;
    protected $mockarooOutputData;

    public function __construct($container)
    {
        $this->logger = $container[OwnLogger::class];
        $this->mapperMockarooRequest = $container[MapperMockarooRequest::class];
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function work()
    {
        try{
            $this->mockarooOutputData = $this->mapperMockarooRequest
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
    public function getMockarooOutputData()
    {
        return $this->mockarooOutputData;
    }


}