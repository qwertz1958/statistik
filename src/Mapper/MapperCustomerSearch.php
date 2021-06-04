<?php
/**
 * Mapper zur unscharfen Suche von Kunden
 * zuständig für die Abfrage der Datenbank Parameter
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Mapper;


use \GrumpyPdo;

class MapperCustomerSearch
{
    protected $flag = false;
    protected $databaseExport;
    protected $inputSearchData;
    /** @var GrumpyPdo */
    protected $grumpyPDO;


    public function __construct($container){
        $this->grumpyPDO = $container[\GrumpyPdo::class];
    }

    /**
     * @param mixed $inputSearchData
     * @return MapperCustomerSearch
     */
    public function setInputSearchData($inputSearchData)
    {
        $this->inputSearchData = $inputSearchData;
        return $this;
    }

    /**
     * unscharfe Datenbankabfrage
     *
     * @return $this
     * @throws \Throwable
     */
    public function customerDatabasereq() : self
    {
        try{
            $lastName = '%';
            $lastName .=  $this->inputSearchData['last_name'] .= '%';
            $this->databaseExport = $this->grumpyPDO
                ->run("select * from kunden WHERE last_name like ?", [$lastName])
                ->fetchAll();
            if(($this->databaseExport != NULL) OR !empty($this->databaseExport))
                $this->flag = true;
                $this->databaseExport = [
                    'export' => $this->databaseExport,
                    'flag'  =>  $this->flag
                ];

            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }


    /**
     * @return mixed
     */
    public function getDatabaseExport()
    {
        return $this->databaseExport;
    }




}