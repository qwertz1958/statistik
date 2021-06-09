<?php
/**
 * Steuerung der App
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Model;


use App\Mapper\IsbnInput;
use App\Mapper\IsbnRequest;

class SteuerungApplikation
{
    protected $flagSaveInDatabase = false;
    protected $flag = false;
    protected $setParams;
    /** @var IsbnRequest */
    protected $isbnRequest;
    /** @var IsbnInput  */
    protected $isbnInput;

    public function __construct($container)
    {
        $this->isbnRequest = $container[IsbnRequest::class];
        $this->isbnInput = $container[IsbnInput::class];
    }


    /**
     * @param mixed $setParams
     * @return SteuerungApplikation
     */
    public function setSetParams($setParams)
    {
        $this->setParams = $setParams;
        return $this;
    }

    public function work() : self
    {
        try{
            $this->flag = $this->isbnRequest
                ->setRequestParams($this->setParams)
                ->dataRequest()
                ->isFlag();



            if($this->flag == true){
                $this->setParams[] = $this->isbnRequest->getRequestData();

                $this->flagSaveInDatabase = $this->isbnInput
                    ->setRequestData($this->setParams)
                    ->inputData()
                    ->isFlagSaveInDatabase();
            }


            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }



    /**
     * @return mixed
     */
    public function getFlagSaveInDatabase()
    {
        return $this->flagSaveInDatabase;
    }


    /**
     * @return mixed
     */
    public function getSetParams()
    {
        return $this->setParams;
    }



}