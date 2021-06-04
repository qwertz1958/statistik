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
    /** @var Template  */
    protected $templateEngine;
    /** @var Checker  */
    protected $checker;
    /** @var FindArticle */
    protected $findArticleModel;
    /** @var ArrayToXml */
    protected $arrayToXmlModel;


    public function __construct($container){
        $this->templateEngine = $container[Template::class];
        $this->checker= $container[Checker::class];
        $this->findArticleModel = $container[\App\Model\FindArticle::class];
        $this->config = $container['config'];
        $this->appLogger = $container[\App\Logger::class];
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
    public function bookOutput($params){
        try{
            $array = [
                'Good guy' => [
                    '_attributes' => ['attr1' => 'value'],
                    'name' => 'Luke Skywalker',
                    'weapon' => 'Lightsaber'
                ],
                'Bad guy' => [
                    'name' => 'Sauron',
                    'weapon' => 'Evil Eye'
                ],
                'The survivor' => [
                    '_attributes' => ['house'=>'Hogwarts'],
                    '_value' => 'Harry Potter'
                ]
            ];

            $result = $this->arrayToXmlModel::convert($array);
            exit();


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



                $this->convertToHtml($templateData, 'pitchInfo');

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