<?php
/**
 * Action zum Einpflegen der Stammdaten des Buches
 *
 * 18.05.2021
 * dominik.schmidt
 */

namespace App\Action;


use App\Checker;
use App\Model\BookDataControl;
use App\Template;
use App\Tool\GenerateResponse;

class BookDataInput
{
    use GenerateResponse;

    protected $flag;
    /** @var Checker */
    protected $checker;
    /** @var BookDataControl  */
    protected $bookDataControl;
    /** @var Template  */
    protected $templateEngine;
    protected $config;

    public function __construct($container)
    {
        $this->templateEngine = $container[Template::class];
        $this->checker = $container[Checker::class];
        $this->bookDataControl = $container[BookDataControl::class];
        $this->config = $container['config'];
    }

    /**
     * @param $params
     * @throws \Throwable
     */
    public function bookDataInput($params)
    {
        try{
            $checkParams = [
                'isbn' => [
                    'mandatory' => true,
                    'value' => isset($params['isbn']) ? $params['isbn'] : NULL,
                    'type' => 'isbn'
                ],
                'title' => [
                    'mandatory' => true,
                    'value' => isset($params['isbn']) ? $params['isbn'] : NULL,
                    'type' => 'title'
                ],
                'verlag' => [
                    'mandatory' => true,
                    'value' => isset($params['isbn']) ? $params['isbn'] : NULL,
                    'type' => 'verlag'
                ]
            ];

            $this->checker
                ->setParams($checkParams)
                ->checkParams();

            $this->flag = $this->bookDataControl
                ->setInputData($params)
                ->work()
                ->isFlag();

            if($this->flag == true){
                $this->block1 = false;
                $this->block2 = false;
                $this->block3 = true;
            }

            $templateData = [
                'basisUrl' => $this->config['basisUrl'],
                'block1' => $this->block1,
                'block2' => $this->block2,
                'block3' => $this->block3,
            ];

            $this->convertToHtml($templateData, 'contentBookInput');

        }catch(\Throwable $e){
            throw $e;
        }
    }
}