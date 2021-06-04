<?php
/**
 * Beschreibung:
 *
 * 02.06.2021
 * arise
 * SteuerungApplikation.php
 */


namespace App\Model;
use App\Mapper\IsbnRequest;


class SteuerungApplikation
{
    /** @var IsbnRequest */
    protected $isbnRequest;
    protected $requestData;

    public function __construct($container)
    {
        $this->isbnRequest = $container[IsbnRequest::class];
    }

    public function work($isbn)
    {
        try {
            $this->requestData = $this->isbnRequest
                ->dataRequest($isbn)
                ->getRequestData();

            if($this->requestData['flag'] == true){

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
}