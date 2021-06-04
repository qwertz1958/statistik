<?php
/**
 * Einpflegen der Stamm des Buches
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Mapper;


use \GrumpyPdo;

class MapperBookDataInput
{
    protected $flagSaveinDatabase = false;
    protected $inputData;
    /** @var GrumpyPdo  */
    protected $grumpyPdo;

    public function __construct($container)
    {
        $this->grumpyPdo = $container[\GrumpyPdo::class];
    }

    /**
     * @param mixed $inputData
     * @return MapperBookDataInput
     */
    public function setInputData($inputData)
    {
        $this->inputData = $inputData;
        return $this;
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function inputData() : self
    {
        try{
            $this->grumpyPdo
                ->run("INSERT INTO artikel(title, publisher, isbn) VALUES(?, ?, ?)", [$this->inputData['title'], $this->inputData['verlag'], $this->inputData['isbn']]);
            $this->flagSaveinDatabase = true;
            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return bool
     */
    public function isFlagSaveinDatabase(): bool
    {
        return $this->flagSaveinDatabase;
    }



}