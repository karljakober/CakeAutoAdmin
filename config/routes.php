<?php
use Cake\Routing\Router;

Router::plugin('CakeAutoAdmin', function ($routes) {
    $routes->connect('/', ['controller' => 'Admin', 'action' => 'dashboard']);
    $routes->connect('/:model', ['controller' => 'Admin', 'action' => 'listing']);
    $routes->connect('/edit/:model/*', ['controller' => 'Admin', 'action' => 'edit']);

    $routes->fallbacks('InflectedRoute');
});
