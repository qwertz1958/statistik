<?php

// Exception Statistik Klasse
$container[\App\Tool\StatisticsError::class] = function($container)
{
	return new App\Tool\StatisticsError();
};

// Statistik Klasse
$container[\App\Tool\Statistics::class] = function($container)
{
    return new App\Action\Statistics();
};
