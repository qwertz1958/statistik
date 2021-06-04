<?php
/**
 * Kontrolliert den Zugang zur App
 *
 * 21.05.2021
 * Kalle
 * CheckLogin.php
 *
 */


namespace App\Middleware;


class CheckLogin
{
    protected $flagLogin;
    protected $basisUrl;

    public function __construct($container){
        $this->basisUrl = $container['config']['basisUrl'];
    }

    /**
     * @param mixed $flagLogin
     * @return CheckLogin
     */
    public function setFlagLogin($flagLogin)
    {
        $this->flagLogin = $flagLogin;
        return $this;
    }

    /**
     * kontrolliert den Flag ogin und ändert notfalls die Route
     *
     * @return $this
     * @throws \Throwable
     */
    public function work() : self
    {
        try{
            $test =123;

            if($this->flagLogin == false) {
                //GrumpyPDO schaue in Tabelle User ob der Benutzer existiert
                    // Benutzer exitiert
                        // neue Methode die abfragtob es den Benutzer gibtb und ob er einmalig ist
                        // Antwort ist die Rolle

                        // neue Methode (abfragen welche Routen für die Rolle zulässig sind)??

                    // Benutzer existiert nicht

                $_SERVER['REQUEST_URI'] = $this->basisUrl . '/login';
            }
            else{
                // abrufen der Benutzergruppe des User
                // grumpyPDO ->
            }

            return $this;
        }
        catch(\Throwable $e){
            throw $e;
        }
    }
}