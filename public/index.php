<?php
/**
 * Bootstrap Datei WarenwirtschaftNG
 *
 * 02.06.2021
 * Kalle
 * index.php
 *
 */
include_once ("../vendor/autoload.php");


try{
    //Container
    $container = new \Slim\Container();

    //slim framework
    $app = new \Slim\App($container);

    include_once ('../config/test.php');

    /** @var \App\Test\MyTest $testKlasse */
//    $testKlasse = $container[\App\Test\MyTest::class];
//    $hallo = $testKlasse->work();

    // Routing
    $app->map(['GET', 'POST'], '/name/[{name}]', function (\Slim\Http\Request $request, Slim\Http\Response $response, array $args)
    {
        $test =123;

        $action = $this->get(\App\Test\MyTest::class);
        $action->work($request, $args);

        return $response;
    });

    //Slim fange an zu arbeiten
    $app->run();

}
catch(\Throwable $e){
    $test = 123;
}