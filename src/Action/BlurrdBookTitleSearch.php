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





    /** @var FindBookTitle */
    protected $findBookTitleModel;


    public function __construct($container)
    {

        $this->config = $container['config'];

        $this->findBookTitleModel = $container[\App\Model\FindBookTitle::class];



    }

    /**
     * @throws \Throwable
     */
    public function booklookinput()
    {
        try{

        }
        catch(\Throwable $e)
        {
            throw $e;
        }

    }


    /**
     * @param \Slim\Http\Request $request
     * @return array
     * @throws \Throwable
     */
    public function booklook(\Slim\Http\Request $request)
    {
        try{

            $params = $request->getParams();

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
            $block2 = false;

            if(count($titleData)>0){
                $block1 = false;
                $block2 = true;
            }

            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'templatename' => 'contentBookTitleSearch',
                'articleData' => $titleData,
                'block1' => $block1,
                'block2' => $block2
            ];

            return $templateData;
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