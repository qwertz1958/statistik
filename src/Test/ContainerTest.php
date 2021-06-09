<?php
/**
 * Testklasse für Container
 *
 * 09.06.2021
 * arise
 * ContainerTest.php
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
    public function eingabeWerte(array $werte) :self
    {
        $this->werte = $werte;

        return $this;
    }

    /**
     * @return null
     */
    public function ausgabeWerte()
    {
        return $this->werte;
    }
}