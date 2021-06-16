<?php
/**
 * Beschreibung:
 *
 * 12.05.2021
 * dominik.schmidt
 */
    $container[\App\Action\AssignManagement::class] = function ($container)
    {
      return new \App\Action\AssignManagement($container);
    };

    $container[\App\Action\BookDataInput::class] = function ($container)
    {
        return new \App\Action\BookDataInput($container);
    };

    $container[\App\Action\ExistsArticleInStore::class] = function ($container)
    {
        return new \App\Action\ExistsArticleInStore($container);
    };

    $container[\App\Action\BlurredCustomerSearch::class] = function ($container)
    {
        return new \App\Action\BlurredCustomerSearch($container);
    };
    $container[\App\Action\BlurrdBookTitleSearch::class] = function ($container)
    {
        return new \App\Action\BlurrdBookTitleSearch($container);
    };

    $container[\App\Action\MockarooRequest::class] = function ($container)
    {
        return new \App\Action\MockarooRequest($container);
    };
