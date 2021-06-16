<?php
/**
 * Mockarooabfrage und übergabe der Daten im XML Format
 *
 * 16.06.2021
 * arise
 * MapperKundendatenRequest.php
 */


namespace App\Mapper;


use App\Error\CustomErrorHandler;
use App\Logger\OwnLogger;


class MapperKundendatenRequest
{
    /** @var OwnLogger */
    protected $logger;
    protected $config;
    protected $data;

    public function __construct($container)
    {
        $this->logger = $container[OwnLogger::class];
        $this->config = $container['config'];
    }

    /**
     * @return $this
     */
    public function work()
    {
        try{
            $url = $this->config['mockaroo'];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);

            $this->data = curl_exec($curl);

            curl_close($curl);

            return $this;
        }catch (\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}