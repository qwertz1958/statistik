<?php
/**
 * Tritt in Kraft, falls die Daten des Buches schon in der Datenbank vorhanden sind
 * Nimmt ein weiteres Exemplar des Buches mit der eingegebenen ISBN in den Bestand der Datenbank auf
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Mapper;


use \GrumpyPdo;

class IsbnInput
{
    protected $flagSaveInDatabase = false;
    protected $requestData;
    /** @var GrumpyPdo  */
    protected $grumpyPdo;


    public function __construct($container)
    {
        $this->grumpyPdo = $container[\GrumpyPdo::class];
    }


    /**
     * @param mixed $requestData
     * @return IsbnInput
     */
    public function setRequestData($requestData)
    {
        $this->requestData = $requestData;
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
                ->run("INSERT INTO bestand (artikel_id, bereich, box, zustand) VALUES(?, ?, ?, ?)",[$this->requestData['0']['id'], $this->requestData['bereich'], $this->requestData['box'], $this->requestData['zustand']]);
            $this->flagSaveInDatabase = true;
            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return bool
     */
    public function isFlagSaveInDatabase(): bool
    {
        return $this->flagSaveInDatabase;
    }




}