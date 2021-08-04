<?php

namespace App;

use Slim\Psr7\Response;

/**
 * Class Swagger , get swagger file
 *
 * @package App
 */
class Swagger
{
    protected $response;

    /**
     * @return string
     */
    public function get(\Slim\Psr7\Response $response) : \Slim\Psr7\Response
    {
        try{
            $swaggerPath = realpath(dirname(__DIR__) . "/../");
            $swaggerPath .= "/swagger/swagger.json";

            $swaggerFile = file_get_contents($swaggerPath);

            $response->getBody()->write($swaggerFile);

            return $response;
        }
        catch(\Throwable $e){
            throw $e;
        }

    }
}
