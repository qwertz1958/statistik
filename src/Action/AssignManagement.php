<?php
/**
 * Beschreibung:
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

    public function __construct(Container $container){
        $this->config = $container['config'];
        $this->steuerungApp = $container[SteuerungApplikation::class];
    }


    public function bookInput(Request $request, array $args)
    {
        try{
            $isbn = $request->getParams();
            Assert::regex($isbn['ISBN_'], '/^(9783)([0-9\-]{9,11})$/', 'Es handelt sich nicht um eine deutschsprachige ISBN!');

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

        }catch(\Throwable $e){
            throw $e;
        }
    }
}