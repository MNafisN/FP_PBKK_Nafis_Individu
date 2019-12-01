<?php

use Phalcon\Mvc\Router;

// Create the router
$router = new Router(false);
$router->clear();

// Define a route
$router->add(
    '/index1/test1',
    [
        'controller' => 'signup',
        'action'     => 'index',
    ]
);

// Another route
$router->add(
    '/index1/test2',
    [
        'controller' => 'signup',
        'action'     => 'dispatch',
    ]
);

$router->handle();