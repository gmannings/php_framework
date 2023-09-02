<?php

$routes = new Routes();

$routes->addRoute(new Route('/', $homeController, 'index'));
$routes->addRoute(new Route('/login', $loginController, 'challenge'));
$routes->addRoute(new Route('/process', $loginController, 'process'));
$routes->addRoute(new Route('/logout', $loginController, 'logout'));

return $routes;