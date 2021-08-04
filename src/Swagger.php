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
    public function get( $response)
    {
        try{
            $swaggerPath = realpath('./../');
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
