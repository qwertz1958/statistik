<?php

// Navigation
$container['navigation'] = function($container)
{
    $navigation = [];

	$navigation[] = ['link' => '/view/home','linkText' => 'Projektbeschreibung'];
	$navigation[] = ['link' => '/view/text','linkText' => 'Text'];
	$navigation[] = ['link' => '/view/tabelle', 'linkText' => 'Tabelle'];
	$navigation[] = ['link' => '/view/charts', 'linkText' => 'Diagramme'];
	$navigation[] = ['link' => '/view/test', 'linkText' => 'Test'];
	$navigation[] = ['link' => '/view/test1', 'linkText' => 'Test 1'];

	return $navigation;
};



