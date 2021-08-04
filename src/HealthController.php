<?php

namespace App;

/**
 * Class HealthController
 *
 * @package App
 */

class HealthController
{
    /**
     * @var \App\Service\Health\Health  
     */
    protected \App\Service\Health\Health $serviceHealth;

    /**
     * @var \App\Service\Health\DtoHealthFtp  
     */
    protected \App\Service\Health\DtoHealthFtp $dtoHealthCheckFtp;

    public function __construct(
        \App\Service\Health\Health $serviceHealth,
        \App\Service\Health\DtoHealthFtp $dtoHealthCheckFtp
    ) {
        $this->serviceHealth = $serviceHealth;
        $this->dtoHealthCheckFtp = $dtoHealthCheckFtp;
    }

    /**
     * example for health check == true
     *
     * @return \Slim\Psr7\Response
     */
    public function get(\Slim\Psr7\Request $request, \Slim\Psr7\Response $response)
    {
        $this->dtoHealthCheckFtp->setNameFtpDir(getenv('ftp_check_dir'));

        $this->dtoHealthCheckFtp = $this->serviceHealth
            ->setDtoHealthFtp($this->dtoHealthCheckFtp)
            ->fly()
            ->getDtoHealthFtp();

        $result = [
            'ftpReady' => $this->dtoHealthCheckFtp->isFtpReady()
        ];

        $json = json_encode($result);

        $response->getBody()->write($json);

        if($this->dtoHealthCheckFtp->isFtpReady() == true) {
            $response->withStatus(200);
        } else {
            $response->withStatus(500);
        }

        return $response->withHeader('Content-Type', 'application/json');
    }
}
