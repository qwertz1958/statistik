<?php
/**
 * Beschreibung:
 *
 * 02.06.2021
 * arise
 * SteuerungApplikation.php
 */


namespace App\Model;
use App\Mapper\IsbnRequest;


class SteuerungApplikation
{
    /** @var IsbnRequest */
    protected $isbnRequest;

    public function __construct($container)
    {
        $this->isbnRequest = $container[IsbnRequest::class];
    }

    public function work($isbn)
    {
        try {
            $this->isbnRequest->dataRequest($isbn);
        }catch(\Throwable $e){
            throw $e;
        }
    }
}