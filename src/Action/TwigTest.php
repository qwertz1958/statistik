<?php
/**
 * Test der template Engine Twig
 *
 * 28.05.2021
 * Kalle
 * TwigTest.php
 *
 */


namespace App\Action;


use App\Tool\GenerateResponse;
use Twig\Environment;

class TwigTest
{
    use GenerateResponse;
    /** @var Environment */
    protected $templateEngine;

    public function __construct($container)
    {
        $this->templateEngine = $container[\Twig\Environment::class];
        $this->config = $container['config'];

    }

    /**
     * Test der template Engine Twig
     *
     * @throws \Throwable
     */
    public function test()
    {
        try{

            $templateData =[
                'bla' => 'aaa',
                'blub' => 'bbb',
                'basisUrl' => $this->config['basisUrl']

            ];

            $templateData['navigation'][0]['href'] = 'http://google.de';
            $templateData['navigation'][1]['href'] = 'http://google.de';
            $templateData['navigation'][2]['href'] = 'http://google.de';
            $templateData['navigation'][3]['href'] = 'http://google.de';

            $templateData['navigation'][0]['caption'] = '111';
            $templateData['navigation'][1]['caption'] = '222';
            $templateData['navigation'][2]['caption'] = '333';
            $templateData['navigation'][3]['caption'] = '444';

            $this->htmlWithTwig($templateData, 'layout.phtml');

        }
        catch(\Throwable $e){
            throw $e;
        }
    }
}