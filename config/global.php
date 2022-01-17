<?php
    
$rootDir = realpath('..');

$dotenv = new Dotenv\Dotenv($rootDir);
$dotenv->load();