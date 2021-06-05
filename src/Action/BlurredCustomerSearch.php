<?php
/**
 * Action zur unscharfen Suche von Kunden
 *
 * 04.06.2021
 * arise
 * BlurredCustomerSearch.php
 */


namespace App\Action;


use App\Model\CustomerSearchControl;
use Slim\Http\Request;
use Webmozart\Assert\Assert;

class BlurredCustomerSearch
{
    /** @var CustomerSearchControl */
    protected $customerSearchControl;
    protected $dataExport;

    public function __construct($container)
    {
        $this->customerSearchControl = $container[CustomerSearchControl::class];
    }

    /**
     * @param Request $request
     * @param array $args
     * @throws \Throwable
     */
    public function customerSearch(Request $request, array $args)
    {
        try{
            $data = $request->getParams();
            Assert::notEmpty($data['last_name'], $message = 'Pflichtfelder ausfüllen');
            $this->dataExport = $this->customerSearchControl
                ->work($data)
                ->getDataExport();


            if($this->dataExport['flag'] == true)
                $test = 123;
            // Platzhalter für die Optionen für die Templateengine
            else
                $test = 123;
            // Platzhalter für die Optionen für die Templateengine
        }catch(\Throwable $e){
            throw $e;
        }
    }
}