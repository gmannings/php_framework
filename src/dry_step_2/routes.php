<?php

use php_framework\dry_step_2\controllers\LoginController;
use php_framework\dry_step_2\controllers\HomeController;
use php_framework\dry_step_2\router\Route;
use php_framework\dry_step_2\router\Routes;

// Set up Controllers
$loginController = new LoginController();
$homeController = new HomeController();

$routes = new Routes();

$routes->addRoute(new Route('/', $homeController, 'index'));
$routes->addRoute(new Route('/login', $loginController, 'challenge'));
$routes->addRoute(new Route('/process', $loginController, 'process'));
$routes->addRoute(new Route('/logout', $loginController, 'logout'));

return $routes;