<?php
/**
 * Action zur unscharfen Suche von Kunden
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Action;


use App\Checker;
use App\Model\CustomerSearchControl;
use App\Template;
use App\Tool\GenerateResponse;

class BlurredCustomerSearch
{
    use GenerateResponse;
    /** @var Checker  */
    protected $checker;
    /** @var Template */
    protected $templateEngine;
    /** @var CustomerSearchControl  */
    protected $customerSearchControl;
    protected $databaseExport;

    protected $config;

    public function __construct($container)
    {
        $this->templateEngine = $container[Template::class];
        $this->config = $container['config'];
        $this->checker = $container[Checker::class];
        $this->customerSearchControl = $container[CustomerSearchControl::class];
    }


    public function customerSearch($params)
    {
        try{
            $checkParams = [
                'last_name' => [
                    'mandatory' => true,
                    'value' => isset($params['last_name']) ? $params['last_name'] : NULL,
                    'type' => 'string',
                    'name' => 'last_name'
                ]
            ];

            $this->checker
                ->setParams($checkParams)
                ->checkParams();

            $this->databaseExport = $this->customerSearchControl
                ->setInputSearchData($params)
                ->work()
                ->getDatabaseExport();

            if($this->databaseExport['flag'] == false){
                $templateData = [
                    'basisUrl' => $this->config['basisUrl'],
                    'block1' => true,
                    'databaseExport' => $this->databaseExport
                ];
            }elseif($this->databaseExport['flag'] == true){
                $templateData = [
                    'basisUrl' => $this->config['basisUrl'],
                    'block2' => true,
                    'databaseExport' => $this->databaseExport
                ];
            }


            $this->convertToHtml($templateData, 'contentCustomerSearch');

        }catch(\Throwable $e)
        {
            throw $e;
        }
    }


    /**
     * Lädt die Eingabemaske der Kundensuche
     *
     * @throws \Throwable
     */
    public function kundensucheErststart()
    {
        try{
            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'block1' => false,
                'block2' => false
            ];

            $this->convertToHtml($templateData, 'contentCustomerSearch');
        }catch(\Throwable $e){
            throw $e;
        }
    }

}