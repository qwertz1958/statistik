<?php

// Navigation
$container['navigation'] = function($container)
{
    $navigation = [];

	$navigation[] = ['link' => '/view/home','linkText' => 'Projektbeschreibung'];
	$navigation[] = ['link' => '/view/text','linkText' => 'Text'];
	$navigation[] = ['link' => '/view/tabelle', 'linkText' => 'Tabelle'];
	$navigation[] = ['link' => '/view/chart1', 'linkText' => 'Balkendiagramm'];
	$navigation[] = ['link' => '/view/chart2', 'linkText' => 'Diagramm 2'];
	$navigation[] = ['link' => '/view/chart3', 'linkText' => 'Diagramm 3'];

	return $navigation;
};



