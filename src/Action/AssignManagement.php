<?php
/**
 * Action zur Abfrage der ISBN
 * bei bereits vorhandenen Datenbestand wird ein neues Exemplar in den Bestand aufgenommen
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Action;
use App\Checker;
use App\Model\SteuerungApplikation;
use App\Template;
use App\Tool\GenerateResponse;

class AssignManagement
{
    use GenerateResponse;

    /** @var Template  */
    protected $templateEngine;
    /** @var Checker  */
    protected $checker;
    /** @var SteuerungApplikation */
    protected $steuerungApp;
    protected $flag = false;
    protected $bookData;
    protected $config;


    public function __construct($container){
        $this->templateEngine = $container[Template::class];
        $this->checker = $container[Checker::class];
        $this->steuerungApp = $container[SteuerungApplikation::class];
        $this->config = $container['config'];
    }

    /**
     * @param $params
     * @throws \Throwable
     */
    public function bookInput($params){
        try{
            $checkParams = [
                'isbn' => [
                    'mandatory' => true,
                    'value' => isset($params['isbn']) ? $params['isbn'] : NULL,
                    'type' => 'isbn'
                ]
            ];

            $this->checker
                ->setParams($checkParams)
                ->checkParams();

            $this->flag = $this->steuerungApp
                ->setSetParams($params)
                ->work()
                ->getFlagSaveInDatabase();

            if($this->flag == true){
                $this->bookData = $this->steuerungApp
                    ->getSetParams();

                $this->block1 = true;
                $this->block2 = false;
                $this->block3 = false;
            }elseif($this->flag == false){
                $this->block1 = false;
                $this->block2 = true;
                $this->block3 = false;
            }

            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'block1' => $this->block1,
                'block2' => $this->block2,
                'block3' => $this->block3,
                'bookData' => $this->bookData
            ];

            $this->convertToHtml($templateData, 'contentBookInput');


        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @throws \Throwable
     */
    public function eingabemaske()
    {
        try{
            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'block1' => false,
                'block2' => false
            ];

            $this->convertToHtml($templateData, 'contentBookInput');
        }catch(\Throwable $e){
            throw $e;
        }
    }

}