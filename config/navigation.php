<?php

// Navigation
$container['navigation'] = function($container)
{
    $navigation = [];

	$navigation[] = ['link' => '/view/home','linkText' => 'Start'];
	$navigation[] = ['link' => '/view/demo1','linkText' => 'Videobeschreibung 1'];
	$navigation[] = ['link' => '/view/demo2','linkText' => 'Videobeschreibung 2'];
	$navigation[] = ['link' => '/view/text','linkText' => 'Text'];
	$navigation[] = ['link' => '/view/kennwerte', 'linkText' => 'Kennwerte'];
	$navigation[] = ['link' => '/view/tabelle', 'linkText' => 'Tabelle'];
	$navigation[] = ['link' => '/view/chart1', 'linkText' => 'Balkendiagramm'];
	$navigation[] = ['link' => '/view/chart2', 'linkText' => 'Zufallswerte'];
	$navigation[] = ['link' => '/view/chart3', 'linkText' => 'Baumbestand'];

	return $navigation;
};



