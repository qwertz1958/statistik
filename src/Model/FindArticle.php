<?php
/**
 * Sucht nach einem Artikel im Warenlager
 *
 * + findet den Artikel. Die Anzahl ist variabel
 * + findet den Artikel nicht.
 *
 * 17.05.2021
 * Kalle
 * FindArticle.php
 *
 */


namespace App\Model;


use App\Mapper\PitchInfo;

class FindArticle
{
    protected $requestParams;

    protected $articleData =[];

    /** @var PitchInfo */
    protected $pitchInfoMapper;

    /**
     * FindArticle constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->pitchInfoMapper = $container[\App\Mapper\PitchInfo::class];
    }

    /**
     * @param mixed $requestParams
     * @return FindArticle
     */
    public function setRequestParams($requestParams)
    {
        $this->requestParams = $requestParams;

        return $this;
    }


    public function work()
    {

        try{


            $this->articleData = $this->pitchInfoMapper
                ->setParams($this->requestParams)
                ->work()
                ->getResponseData();

            return $this;
        }
        catch(\Throwable $e){
            throw $e;
        }
    }

    /**
     * @return array
     */
    public function getArticleData(): array
    {
        return $this->articleData;
    }


}