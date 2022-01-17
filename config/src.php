<?php

// Standard Route Errors
$container[\App\ErrorCodes::class] = function()
{
    return new App\ErrorCodes();
};