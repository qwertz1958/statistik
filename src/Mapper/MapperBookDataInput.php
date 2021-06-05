<?php
/**
 * Einpflegen der Stamm des Buches
 *
 * 05.06.2021
 * arise
 * MapperBookDataInput.php
 */


namespace App\Mapper;


class MapperBookDataInput
{
    /** @var \GrumpyPdo */
    protected $grumpyPdo;
    protected $flag = false;

    public function __construct($container)
    {
        $this->grumpyPdo = $container[\GrumpyPdo::class];
    }

    /**
     * @param array $inputData
     * @return $this
     * @throws \Throwable
     */
    public function work(array $inputData) : self
    {
        try{
            $this->grumpyPdo
                ->run("INSERT INTO artikel(title, publisher, isbn) VALUES(?, ?, ?)", [$inputData['title'], $inputData['verlag'], $inputData['ISBN']]);
            $this->flag = true;

            return $this;
        }catch (\Throwable $e){
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