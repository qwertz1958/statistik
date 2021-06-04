<?php
/**
 * Mapper zum Abfragen ob sich die eingegebene ISBN im Datenbestand befindet
 *
 * 02.06.2021
 * arise
 * IsbnRequest.php
 */


namespace App\Mapper;


class IsbnRequest
{
    /** @var \GrumpyPdo */
    protected $grumpyPdo;
    protected $requestData;
    protected $flag = false;

    public function __construct($container)
    {
        $this->grumpyPdo = $container[\GrumpyPdo::class];
    }

    public function dataRequest($isbn)
    {
        try{
            $isbn = $isbn['ISBN'];
            $this->requestData = $this->grumpyPdo
                ->run("SELECT warenwirtschaft.artikel.id, warenwirtschaft.artikel.title FROM warenwirtschaft.artikel WHERE artikel.ISBN = :isbn", ["isbn" => "$isbn"])
                ->fetch();
            if(($this->requestData != NULL) OR !empty($this->requestData))
                $this->flag = true;

            $this->requestData = [
                'export' => $this->requestData,
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
    public function getRequestData()
    {
        return $this->requestData;
    }


}