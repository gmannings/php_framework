<?php

use php_framework\models_services\controllers\LoginController;
use php_framework\models_services\controllers\HomeController;
use php_framework\models_services\router\Route;
use php_framework\models_services\router\Routes;

// Set up Controllers
$loginController = new LoginController();
$homeController = new HomeController();

$routes = new Routes();

$routes->addRoute(new Route('/', $homeController, 'index'));
$routes->addRoute(new Route('/login', $loginController, 'challenge'));
$routes->addRoute(new Route('/process', $loginController, 'process'));
$routes->addRoute(new Route('/logout', $loginController, 'logout'));

return $routes;