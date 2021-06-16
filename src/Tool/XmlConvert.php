<?php


namespace App\Tool;


trait XmlConvert
{
    public function convert($outputData)
    {
        try{

            $outputData = simplexml_load_string($outputData);

            $outputData = json_encode($outputData);
            $outputData = json_decode($outputData, true);

            return $outputData;
        }catch (\Throwable $e){
            throw $e;
        }

    }
}