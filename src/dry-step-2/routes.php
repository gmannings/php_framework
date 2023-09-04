<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';

// Set up Controllers
$loginController = new LoginController();
$homeController = new HomeController();

$routes = new Routes();

$routes->addRoute(new Route('/', $homeController, 'index'));
$routes->addRoute(new Route('/login', $loginController, 'challenge'));
$routes->addRoute(new Route('/process', $loginController, 'process'));
$routes->addRoute(new Route('/logout', $loginController, 'logout'));

return $routes;