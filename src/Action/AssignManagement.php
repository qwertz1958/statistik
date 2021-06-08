<?php
/**
 * Action zur Abfrage der ISBN
 * bei bereits vorhandenen Datenbestand wird ein neues Exemplar in den Bestand aufgenommen
 *
 * 02.06.2021
 * arise
 * AssignManagement.php
 */


namespace App\Action;
use App\Model\SteuerungApplikation;
use Slim\Container;
use Slim\Http\Request;
use Webmozart\Assert\Assert;




class AssignManagement
{
    protected $config;

    protected $container;
    /** @var SteuerungApplikation */
    protected $steuerungApp;
    protected $block;

    public function __construct(Container $container){
        $this->config = $container['config'];
        $this->steuerungApp = $container[SteuerungApplikation::class];
    }

    /**
     * @param Request $request
     * @param array $args
     * @return $this
     * @throws \Throwable
     */
    public function bookInput(Request $request, array $args)
    {
        try{
            $data = $request->getParams();
            Assert::notEmpty($data['ISBN'], $message = 'Pflichtfelder ausfüllen');
            Assert::notEmpty($data['bereich'], $message = 'Pflichtfelder ausfüllen');
            Assert::notEmpty($data['box'], $message = 'Pflichtfelder ausfüllen');
            Assert::notEmpty($data['zustand'], $message = 'Pflichtfelder ausfüllen');
            Assert::regex($data['ISBN'], '/^(9783)([0-9\-]{9,11})$/', 'Es handelt sich nicht um eine deutschsprachige ISBN!');
            $requestData = $this->steuerungApp
                ->work($data)
                ->getRequestData();

            $flag = $this->steuerungApp
                ->getFlag();

            if(($requestData['flag'] == true) AND ($flag == true)){
                $this->block = [
                    'block1' => true,
                    'block2' => false,
                    'block3' => false,
                    'title' => $requestData['export']['title'],
                    'id' => $requestData['export']['id']
                ];
            }
            else
            {
                $this->block = [
                    'block1' => false,
                    'block2' => true,
                    'block3' => false,
                    'title' => $requestData['export']['title'],
                    'id' => $requestData['export']['id']
                ];
            }


            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    public function myEcho()
    {
        echo 'hello';
    }

    /**
     * @return mixed
     */
    public function getblock()
    {
        return $this->block;
    }



}