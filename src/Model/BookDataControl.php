<?php
/**
 * Steuerung der Buchdatenpflege
 *
 * 05.06.2021
 * arise
 * BookDataControl.php
 */


namespace App\Model;


use App\Mapper\MapperBookDataInput;

class BookDataControl
{
    /** @var MapperBookDataInput */
    protected $mapperBookDataInput;
    protected $flag = false;

    public function __construct($container)
    {
        $this->mapperBookDataInput = $container[MapperBookDataInput::class];
    }

    /**
     * @param array $data
     * @return $this
     * @throws \Throwable
     */
    public function work(array $data) : self
    {
        try{
            $this->flag = $this->mapperBookDataInput
                ->work($data)
                ->isFlag();

            return $this;
        }catch(\Throwable $e){
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