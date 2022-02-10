<?php

// Navigation
$container['navigation'] = function($container)
{
    $navigation = [];

	$navigation[] = ['link' => '/view/home','linkText' => 'Projektbeschreibung'];
	$navigation[] = ['link' => '/view/text','linkText' => 'Text'];
	$navigation[] = ['link' => '/view/kennwerte', 'linkText' => 'Kennwerte'];
	$navigation[] = ['link' => '/view/tabelle', 'linkText' => 'Tabelle'];
	$navigation[] = ['link' => '/view/chart1', 'linkText' => 'Balkendiagramm'];
	$navigation[] = ['link' => '/view/chart2', 'linkText' => 'Zufallswerte'];
	$navigation[] = ['link' => '/view/chart3', 'linkText' => 'Baumbestand'];
	$navigation[] = ['link' => '/view/chart4', 'linkText' => 'DDDD'];

	return $navigation;
};



