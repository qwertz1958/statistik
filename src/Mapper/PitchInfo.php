<?php
/**
 * In welchem Bereich/Box befindet sich der Artikel
 *
 * 17.05.2021
 * Kalle
 * PitchInfo.php
 *
 */


namespace App\Mapper;


use \GrumpyPdo;

class PitchInfo
{

    protected $params;
    /** @var  */
    protected $responseData;

    /** @var GrumpyPdo  */
    protected $GrumpyPDO;

    public function __construct($container)
    {
        $this->GrumpyPDO = $container[\GrumpyPdo::class];
    }


    /**
     * @return $this
     * @throws \Throwable
     */
    public function work() : self
    {
        try{

            $this->responseData = $this->GrumpyPDO
                ->run("SELECT bestand.bereich, bestand.box, artikel.title 
                             FROM artikel, bestand 
                             WHERE artikel.ISBN =? 
                             AND bestand.artikel_id = artikel.id", [$this->params['isbn']])
                ->fetchAll();



            return $this;
        }
        catch(\Throwable $e)
        {
            throw $e;
        }
    }


    /**
     * @return array
     */
    public function getResponseData() : array
    {
        return $this->responseData;
    }

    /**
     * @param mixed $params
     * @return PitchInfo
     */
    public function setParams(array $params)
    {
        $this->params = $params;

        return $this;
    }


}