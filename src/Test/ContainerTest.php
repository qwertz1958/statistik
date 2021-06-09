<?php
/**
 * Test für Containerverhalten
 *
 * 09.06.2021
 * Kalle
 * ContainerTest.php
 *
 */


namespace App\Test;


class ContainerTest
{

    protected $werte = NULL;

    public function __construct($container)
    {

    }

    /**
     * @param array $werte
     * @return $this
     */
    public function eingabeWerte(array $werte)
    {
        $this->werte = $werte;

        return $this;
    }

    /**
     * @return mixed
     */
    public function ausgabeWerte()
    {
        return $this->werte;
    }
}