<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Tqdev\PhpCrudApi\Cache\Cache;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\Middleware\Router\Router;

class Zusatz
{
	protected $responder;
	protected $db;
	protected $reflection;
	protected $cache;


    public function __construct(Router $router, Responder $responder, GenericDB $db, ReflectionService $reflection, Cache $cache)
    {
        $router->register('GET', '/zusatz', array($this, 'getZusatz'));

        $this->db = $db;

        $this->reflection = $reflection;

        $this->cache = $cache; 

        $this->responder = $responder;
    }

    public function getZusatz(ServerRequestInterface $request): ResponseInterface
    {
    	$test = 123;

        $sql = "SELECT * FROM baumkataster limit 20";
	    $pdo_statement = $this->db->pdo()->query($sql);
	    $result = $pdo_statement->fetchAll();

        // return $this->responder->success(['results' => $result]);
        return $this->responder->success(['message' => 'Controller Zusatz !']); 
    }

}