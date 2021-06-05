<?php
/**
 * Mapper zur unscharfen Suche von Kunden
 * zuständig für die Abfrage der Datenbank Parameter
 *
 * 05.06.2021
 * arise
 * MapperCustomerSearch.php
 */


namespace App\Mapper;


class MapperCustomerSearch
{
    /** @var \GrumpyPdo */
    protected $grumpyPdo;
    protected $dataExport;
    protected $flag = false;

    public function __construct($container)
    {
        $this->grumpyPdo = $container[\GrumpyPdo::class];
    }

    /**
     * @param array $data
     * @return $this
     * @throws \Throwable
     */
    public function customerDatabaseReq(array $data) :self
    {
        try{
            $data = '%' . $data['last_name'] . '%';
            $this->dataExport = $this->grumpyPdo
                ->run("select * from kunden WHERE last_name like ?", [$data])
                ->fetchAll();

            if(($this->dataExport != NULL) OR (!empty($this->dataExport)))
                $this->flag = true;
                $this->dataExport = [
                    'export' => $this->dataExport,
                    'flag' => $this->flag
                ];

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