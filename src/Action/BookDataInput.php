<?php
/**
 * Action zum Einpflegen der Stammdaten des Buches
 *
 * 04.06.2021
 * arise
 * BookDataInput.php
 */


namespace App\Action;


use App\Model\BookDataControl;
use Slim\Http\Request;
use Webmozart\Assert\Assert;

class BookDataInput
{
    /** @var BookDataControl */
    protected $bookDataControl;
    protected $flag = false;
    protected $block;

    public function __construct($container){
        $this->bookDataControl = $container[BookDataControl::class];
    }

    /**
     * @param Request $request
     * @param array $args
     * @throws \Throwable
     */
    public function bookDataInput(Request $request, array $args)
    {
        try{
            $data = $request->getParams();
            Assert::notEmpty($data['ISBN'], $message = 'Pflichtfelder ausfüllen');
            Assert::notEmpty($data['title'], $message = 'Pflichtfelder ausfüllen');
            Assert::notEmpty($data['verlag'], $message = 'Pflichtfelder ausfüllen');
            Assert::regex($data['ISBN'], '/^(9783)([0-9\-]{9,11})$/', 'Es handelt sich nicht um eine deutschsprachige ISBN!');

            $this->flag = $this->bookDataControl
                ->work($data)
                ->isFlag();

            if($this->flag == true)
                $this->block = [
                    'block1' => false,
                    'block2' => false,
                    'block3' => true
                ];

            return $this;
        }catch (\Throwable $e){
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