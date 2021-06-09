<?php
/**
 * Methoden zur Ausgabe des Response
 *
 * 12.05.2021
 * dominik.schmidt
 */

namespace App\Tool;


trait GenerateResponse
{
    /**
     * erstellt den Response mittels Template Engine
     *
     * @param $templateData
     * @param $contentTemplate
     */
    public function convertToHtml(array $templateData,string $contentTemplate)
    {
        $this->templateEngine->setTemplateData($templateData);

        $basePath = __DIR__;
        $templatePath = realpath($basePath . '../../../public/template/');

        //fluent interface
        $this->templateEngine
            ->setFile($templatePath . '\\' . $contentTemplate . '.phtml')
            ->setLayout($templatePath . '\\layout.phtml')
            ->render();
    }

    /**
     * Rückgabe des Response mittels JSON - Format
     *
     * @param $responseData
     */
    protected function convertToJson($responseData)
    {
        echo json_encode($responseData);
    }

    /**
     * @param array $templateData
     * @param string $templateName
     */
    protected function htmlWithTwig(array $templateData, string $templateName)
    {
        $template = $this->templateEngine->load($templateName);

        echo $template->render($templateData);
    }
}