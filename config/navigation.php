<?php

// Navigation
$container['navigation'] = function($container)
{
    $navigation = [];

	$navigation[0] = ['link' => '/view/home','linkText' => 'Projektbeschreibung'];
	$navigation[1] = ['link' => '/view/tabelle', 'linkText' => 'Tabelle'];
	$navigation[2] = ['link' => '/view/charts', 'linkText' => 'Diagramme'];

	return $navigation;
};



