<?php
/**
 * Error Handler
 *
 * 07.06.2021
 * arise
 * CustomErrorHandler.php
 */


namespace App\Error;
use App\Action\AssignManagement;

class CustomErrorHandler
{
    /** @var AssignManagement */
    protected $assignManagement;

    public function __construct($container)
    {
        $this->assignManagement = $container[\App\Action\AssignManagement::class];
    }

    public function __invoke($request, $response, $exception){
        try{
            $test = 123;

            $assignManagement = $this->assignManagement;
            $echo = $assignManagement->myEcho();

            return $response
                ->withStatus(500)
                ->withHeader('Content-Type', 'text/html')
                ->write('Ein Fehler ist aufgetreten');
        }
        catch(\Throwable $e){
            throw $e;
        }
    }
}