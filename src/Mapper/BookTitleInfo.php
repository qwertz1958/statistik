<?php
/**
 * Verbindung zur Datenbank und
 * Abfrage von ISBN, Titel des Buches und Bestand im Lager
 *
 * 20.05.2021
 * Kalle
 * BookTitleInfo.php
 *
 */


namespace App\Mapper;


use \GrumpyPdo;

class BookTitleInfo
{
    protected $params;

    protected $flag = false;


    protected $responseData;
    /** @var GrumpyPdo */
    protected $GrumpyPdo;

    public function __construct($container)
    {
        $this->GrumpyPdo = $container[\GrumpyPdo::class];
    }

    public function work() : self
    {
        try
        {
            $nutzereingabe = '%';
            $nutzereingabe .= $this->params['titel'].'%';

            $this->responseData = $this->GrumpyPdo
                ->run("SELECT artikel.ISBN, artikel.title, COUNT(*) AS anzahl FROM artikel, bestand 
                             WHERE artikel.title LIKE ? AND artikel.id = bestand.artikel_id
                             GROUP BY artikel.ISBN
                             ORDER BY anzahl desc", [$nutzereingabe])
                ->fetchAll();
//            if(($this->responseData != NULL) OR !empty($this->responseData)) {
//                $this->flag = true;
//                $this->responseData = [
//                    'export' => $this->responseData,
//                    'flag' => $this->flag
//                ];
//            }
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
     * @param array $params
     * @return $this
     */
    public function setParams(array $params)
    {
        $this->params = $params;

        return $this;
    }




}