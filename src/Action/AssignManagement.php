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
    protected $requestData;

    public function __construct(Container $container){
        $this->config = $container['config'];
        $this->steuerungApp = $container[SteuerungApplikation::class];
    }

    /**
     * @param Request $request
     * @param array $args
     * @throws \Throwable
     */
    public function bookInput(Request $request, array $args)
    {
        try{
            $data = $request->getParams();
            Assert::regex($data['ISBN'], '/^(9783)([0-9\-]{9,11})$/', 'Es handelt sich nicht um eine deutschsprachige ISBN!');
            $requestData = $this->steuerungApp
                ->work($data)
                ->getRequestData();

            $flag = $this->steuerungApp->getFlag();

            if(($requestData['flag'] == true) AND ($flag == true))
                $test = 123;
            else
                $test = 123;

        }catch(\Throwable $e){
            throw $e;
        }
    }

}