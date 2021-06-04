<?php
/**
 * Tritt in Kraft, falls die Daten des Buches schon in der Datenbank vorhanden sind
 * Nimmt ein weiteres Exemplar des Buches mit der eingegebenen ISBN in den Bestand der Datenbank auf
 *
 * 04.06.2021
 * arise
 * IsbnInput.php
 */


namespace App\Mapper;


class IsbnInput
{
    /** @var \GrumpyPdo */
    protected $grumpyPdo;
    protected $flag = false;

    public function __construct($container)
    {
        $this->grumpyPdo = $container[\GrumpyPdo::class];
    }

    /**
     * @param array $requestData
     * @return $this
     * @throws \Throwable
     */
    public function inputData(array $requestData) : self
    {
        try{
            $this->grumpyPdo
                ->run("INSERT INTO bestand (artikel_id, bereich, box, zustand) VALUES(?, ?, ?, ?)",[$requestData['export']['id'], $requestData['input']['bereich'], $requestData['input']['box'], $requestData['input']['zustand']]);
            $this->flag = true;

            return $this;
        }catch (\Throwable $e)
        {
            throw $e;
        }
    }

    /**
     * @return bool
     */
    public function isFlag(): bool
    {
        return $this->flag;
    }


}