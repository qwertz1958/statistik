<?php
/**
 * Überprüfung der ankommenden Daten des Request und entfernen überflüssiger Leerzeichen
 *
 * 16.04.2021
 * arise
 * Checker.php
 */

namespace App;
use App;
class Checker
{

    protected $params = [];
    protected $checkSimpleTypes = ['string', 'int', 'bool', 'array'];
    public function __construct($container)
    {

    }

    /**
     * @param array $params
     * @return Checker
     */
    public function setParams(array $params): Checker
    {
        $this->params = $params;
        return $this;
    }
    public function checkParams()
    {
        try{
            foreach($this->params as $key => $validators)
            {
                // trimmen der Parameter
                if($validators['type'] == 'string')
                    $validators['value'] = trim($validators['value']);

                // Kontrolle der Pflichtfelder
                if($validators['mandatory'] == true){
                    $flagMandatory = $this->isMandatory($validators);
                    if($flagMandatory == false)
                        throw new \Exception('missing param ' . $key);
                }
                // reguläre Ausdrücke
                if($validators['type'] == 'isbn')
                    $this->validateIsbn($validators['value']);
                elseif($validators['type'] == 'email')
                    $this->validateMail($validators['value']);
                // Passwort Überprüfung
                elseif($validators['type'] == 'password')
                    $this->validatePasswort($validators['value']);
            }
            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }
    /**
     * @param $value
     * @return bool
     * @throws \Exception
     */
    private function validateIsbn($value) : bool
    {
        if(preg_match('/^(9783)([0-9\-]{9,11})$/', $value)) {
            return true;
        }elseif($value == NULL){
            return false;
        }else
            throw new \Exception(('no German ISBN'));
    }


    /**
     * @param $validators
     * @return bool
     */
    private function isMandatory($validators) : bool
    {
        if(empty($validators['value']))
            return false;
        else
            return true;
    }

    /**
     * @param $value
     * @return bool
     * @throws \Exception
     */
    private function validateMail($value) : bool
    {
        if(preg_match('/([a-zA-Z0-9\.\-]+)(\@)([a-zA-z\.\-]+)/', $value ))
            return true;
        elseif ($value == NULL)
            return false;
        else
            throw new \Exception('mail validation not correct');
    }

    /**
     * @param $value
     * @return bool
     * @throws \Exception
     */
    private function validatePasswort($value) : bool
    {
        if(preg_match('/^(?=.*\d)(?=.*[!])(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{3,}$/', $value))
            return true;
        elseif($value == NULL)
            return false;
        else
            throw new \Exception('Das Passwort muss aus einer Kombination von klein- und Großschreibung sowie Sonderzeichen bestehen');
    }
}