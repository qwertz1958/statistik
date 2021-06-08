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
    protected $block;

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
            {
                $this->block = [
                    'export' => $this->dataExport['export'],
                    'block1' => false,
                    'block2' => true,
                    'flag' => $this->dataExport['flag']
                ];
            }
            else
                $this->block = [
                    'export' => $this->dataExport['export'],
                    'block1' => true,
                    'block2' => false,
                    'flag' => $this->dataExport['flag']
                ];

            return $this;
        }catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getBlock()
    {
        return $this->block;
    }


}