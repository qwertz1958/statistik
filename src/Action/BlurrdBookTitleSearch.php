<?php
/**
 * Beschreibung:
 *
 * 20.05.2021
 * Kalle
 * BlurrdBookTitleSearch.php
 *
 */


namespace App\Action;


use App\Checker;
use App\Model\FindBookTitle;
use App\Template;
use App\Tool\GenerateResponse;

class BlurrdBookTitleSearch
{
    use GenerateResponse;

    protected $config;

    protected $appLogger;

    /** @var Template */
    protected $templateEngine;
    /** @var Checker */
    protected $checker;
    /** @var FindBookTitle */
    protected $findBookTitleModel;


    public function __construct($container)
    {
        $this->templateEngine = $container[Template::class];
        $this->config = $container['config'];
        $this->checker = $container[Checker::class];
        $this->findBookTitleModel = $container[\App\Model\FindBookTitle::class];
        $this->appLogger = $container[\App\Logger::class];


    }

    /**
     * @throws \Throwable
     */
    public function booklookinput()
    {
        try{
            $this->convertToHtml();
        }
        catch(\Throwable $e)
        {
            throw $e;
        }

    }

    /**
     * @param $params
     * @throws \Throwable
     */
    public function booklook($params)
    {
        try{
            $checkParams = [
                'titel' => [
                    'mandatory' => true,
                    'value' => isset($params['titel']) ? $params['titel'] : NULL,
                    'type' => 'isbn'
                ]
            ];

            $titleData = $this->findBookTitleModel
                ->setRequestParams($params)
                ->work()
                ->getTitleData();

            $block1 = true;
            $block2 = true;

            if(count($titleData)>0){
                $block1 = false;
                $block2 = true;
            }

            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'articleData' => $titleData,
                'block1' => $block1,
                'block2' => $block2
            ];

            $this->convertToHtml($templateData, 'contentBookTitleSearch');

        }
        catch(\Throwable $e)
        {
            throw $e;
        }

    }

    /**
     * Ruft die Eingabemaske der Buchsuche auf
     *
     * @throws \Throwable
     */
    public function bookTitleSearchStart()
    {
        try{
            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'block1' => false,
                'block2' => false
            ];

            $this->convertToHtml($templateData, 'contentBookTitleSearch');

        }
        catch(\Throwable $e){
            throw $e;
        }

    }
}