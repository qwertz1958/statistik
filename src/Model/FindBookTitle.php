<?php
/**
 * Sucht nach dem Bestand eines Titels im Lager
 *
 * + findet den Bestand des Titels
 * + findet den Titel des Buches nicht
 *
 * 20.05.2021
 * Kalle
 * FindBookTitle.php
 *
 */


namespace App\Model;


use App\Mapper\BookTitleInfo;

class FindBookTitle
{
    protected $requestParams;
    protected $titleData = [];

    /** @var BookTitleInfo */
    protected $bookTitleInfoMapper;

    public function __construct($container)
    {
        $this->bookTitleInfoMapper = $container[\App\Mapper\BookTitleInfo::class];

    }

    /**
     * @param mixed $requestParams
     * @return FindBookTitle
     */
    public function setRequestParams($requestParams)
    {
        $this->requestParams = $requestParams;

        return $this;
    }

    public function work()
    {
        try{
            $this->titleData = $this->bookTitleInfoMapper
                ->setParams($this->requestParams)
                ->work()
                ->getResponseData();

            return $this;

        }
        catch(\Throwable $e) {

            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getTitleData()
    {
        return $this->titleData;
    }



}