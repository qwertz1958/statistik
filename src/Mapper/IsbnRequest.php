<?php
/**
 * Abfrage ob die vom Mitarbeiter eingegebene ISBN schon in der Datenbank vorhanden ist
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Mapper;


use \GrumpyPdo;

class IsbnRequest
{
    protected $requestData;
    protected $requestParams;
    protected $flag = false;

    /** @var GrumpyPdo */
    protected $GrumpyPDO;

    public function __construct($container){
        $this->GrumpyPDO = $container[\GrumpyPdo::class];
    }

    /**
     * @param mixed $requestParams
     * @return IsbnRequest
     */
    public function setRequestParams($requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function dataRequest() : self
    {
        try{
            $this->isbn = $this->requestParams['isbn'];
            $this->requestData = $this->GrumpyPDO
                ->run("SELECT warenwirtschaft.artikel.id, warenwirtschaft.artikel.title FROM warenwirtschaft.artikel WHERE artikel.ISBN = :isbn", ["isbn" => "$this->isbn"])->fetch();
            if($this->requestData != false)
                $this->flag = true;
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
     * @return bool
     */
    public function isFlag(): bool
    {
        return $this->flag;
    }




}