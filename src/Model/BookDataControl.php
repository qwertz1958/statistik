<?php
/**
 * Steuerung der Buchdatenpflege
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Model;


use App\Mapper\MapperBookDataInput;

class BookDataControl
{
    protected $inputData;
    /** @var MapperBookDataInput  */
    protected $mapperBookDataInput;
    protected $flag = false;

    public function __construct($container){
        $this->mapperBookDataInput = $container[MapperBookDataInput::class];
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function work() : self
    {
        try{
            $this->flag = $this->mapperBookDataInput
                ->setInputData($this->inputData)
                ->inputData()
                ->isFlagSaveinDatabase();

            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }



    /**
     * @param mixed $inputData
     * @return BookDataControl
     */
    public function setInputData($inputData)
    {
        $this->inputData = $inputData;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFlag(): bool
    {
        return $this->flag;
    }



}