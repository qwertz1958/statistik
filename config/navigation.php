<?php

// Navigation
$container['navigation'] = function($container)
{
    $navigation = [];

	$navigation[0] = ['link' => '/view/home','linkText' => 'Projektbeschreibung'];
	$navigation[1] = ['link' => '/view/tabelle', 'linkText' => 'Tabelle'];

	return $navigation;
};



