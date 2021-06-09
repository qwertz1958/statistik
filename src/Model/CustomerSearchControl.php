<?php
/**
 * Model zur unscharfen Suche von Kunden
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Model;


use App\Mapper\MapperCustomerSearch;

class CustomerSearchControl
{
    protected $databaseExport;
    protected $inputSearchData;
    /** @var MapperCustomerSearch  */
    protected $mapperCustomerSearch;

    public function __construct($container)
    {
        $this->mapperCustomerSearch = $container[MapperCustomerSearch::class];
    }

    /**
     * Übergabe der Parameter für die Query
     * übernahme der Ausgabe der Datenbankabfrage
     *
     * @return $this
     * @throws \Throwable
     */
    public function work() : self
    {
        try{
            $this->databaseExport = $this->mapperCustomerSearch
                ->setInputSearchData($this->inputSearchData)
                ->customerDatabasereq()
                ->getDatabaseExport();

            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @param mixed $inputSearchData
     * @return CustomerSearchControl
     */
    public function setInputSearchData($inputSearchData)
    {
        $this->inputSearchData = $inputSearchData;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getDatabaseExport()
    {
        return $this->databaseExport;
    }

}