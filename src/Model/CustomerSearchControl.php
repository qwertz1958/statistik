<?php
/**
 * Model zur unscharfen Suche von Kunden
 *
 * 05.06.2021
 * arise
 * CustomerSearchControl.php
 */


namespace App\Model;


use App\Mapper\MapperCustomerSearch;

class CustomerSearchControl
{
    /** @var MapperCustomerSearch */
    protected $mapperCustomerSearch;
    protected $dataExport;

    public function __construct($container)
    {
        $this->mapperCustomerSearch = $container[MapperCustomerSearch::class];
    }

    /**
     * @param array $data
     * @return $this
     * @throws \Throwable
     */
    public function work(array $data) : self
    {
        try{
            $this->dataExport = $this->mapperCustomerSearch
                ->customerDatabaseReq($data)
                ->getDataExport();

            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getDataExport()
    {
        return $this->dataExport;
    }

}