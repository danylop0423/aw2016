<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('index', new Routing\Route('/', array(
    '_controller' => 'Modules\\Home\\HomeActions::indexAction',
)));

$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => 'Modules\\Home\\HomeActions::helloAction',
)));

return $routes;
