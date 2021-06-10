<?php
/**
 * Model zur Überprüfung der ISBN auf vorhandene Metadaten
 * Bei erfolgreicher Überprüfung wird ein Exemplar des Buches in den Bestand aufgenommen
 *
 * 02.06.2021
 * arise
 * SteuerungApplikation.php
 */


namespace App\Model;
use App\Mapper\IsbnInput;
use App\Mapper\IsbnRequest;


class SteuerungApplikation
{
    /** @var IsbnRequest */
    protected $isbnRequest;
    /** @var IsbnInput */
    protected $isbnInput;
    protected $requestData;
    protected $flag;

    public function __construct($container)
    {
        $this->isbnRequest = $container[IsbnRequest::class];
        $this->isbnInput = $container[IsbnInput::class];
    }

    /**
     * @param array $data
     * @return $this
     * @throws \Throwable
     */
    public function work(array $data) : self
    {
        try {
            $this->requestData = $this->isbnRequest
                ->dataRequest($data)
                ->getRequestData();

            if($this->requestData['flag'] == true){
                $this->flag = $this->isbnInput
                    ->inputData($this->requestData)
                    ->isFlag();
            }

            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getRequestData()
    {
        return $this->requestData;
    }

    /**
     * @return mixed
     */
    public function getFlag()
    {
        return $this->flag;
    }


}