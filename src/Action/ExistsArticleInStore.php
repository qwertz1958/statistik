<?php


namespace App\Action;
use App\Checker;
use App\Model\FindArticle;
use App\Template;
use App\Tool\GenerateResponse;
use Spatie\ArrayToXml\ArrayToXml;

class ExistsArticleInStore
{
    use GenerateResponse;

    protected $config;

    protected $appLogger;


    /** @var \App\Model\FindArticle */
    protected $findArticleModel;
    /** @var ArrayToXml */
    protected $arrayToXmlModel;


    public function __construct($container){
        $this->findArticleModel = $container[\App\Model\FindArticle::class];
        $this->config = $container['config'];
        $this->arrayToXmlModel = $container[\Spatie\ArrayToXml\ArrayToXml::class];
    }


    public function bookInput(){
        try{

            $this->convertToHtml();
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @param $params
     * @throws \Throwable
     */
    public function bookOutput(\Slim\Http\Request $request){
        try{

            $params = $request->getParams();

            $articleData = $this->findArticleModel
                ->setRequestParams($params)
                ->work()
                ->getArticleData();

            $block1 = true;
            $block2 = false;

            if(count($articleData)>0){
                $block1 = false;
                $block2 = true;
            }

            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'articleData' => $articleData,
                'block1' => $block1,
                'block2' => $block2
            ];



            return $templateData;

        }
        catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @throws \Throwable
     */
    public function erststart()
    {
        try
        {
            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'block1' => false,
                'block2' => false,
            ];


            $templateData[0]['articleData'] = ['bereich' => ' ', 'box' => ' ', 'title' => ' '];

            $this->convertToHtml($templateData, 'pitchInfo');
        }
        catch(\Throwable $e)
        {
            throw $e;
        }
    }

}