<?php


namespace App\Tool;


trait XmlConvert
{
    public function convert($mockarooOutputData)
    {
        try{
            $handle = fopen("..\src\xml\mockarooOutputData.xml", "w");
            fwrite($handle, $mockarooOutputData);
            fclose($handle);

            $mockarooOutputData = simplexml_load_file("..\src\xml\mockarooOutputData.xml");

            $mockarooOutputData = json_encode($mockarooOutputData);
            $mockarooOutputData = json_decode($mockarooOutputData, true);

            return $mockarooOutputData;
        }catch (\Throwable $e){
            throw $e;
        }

    }
}