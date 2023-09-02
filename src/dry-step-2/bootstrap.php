<?php

require_once '../../vendor/autoload.php';
require_once 'controllers/BaseController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'views/ViewRenderer.php';
require_once 'views/ViewDto.php';

// Set up Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

// Set up ViewRenderer
$viewRenderer = new ViewRenderer(
  $twig
);

// Set up Controllers
$loginController = new LoginController();
$homeController = new HomeController();

// Load routes
require_once 'router/Routes.php';
require_once 'router/Route.php';
require_once 'routes.php';

$routes = $routes->getRoutes();

session_start();

const BASE_DIR = __DIR__;

// Get the current URL path without the query string
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Check if the path exists in the routes and if so, call the associated controller action
$view = null;
if (isset($routes[$urlPath])) {
  $route = $routes[$urlPath];
  $controller = $route->getController();
  $action = $route->getAction();
  $view = $controller->$action();
} else {
  // Handle 404 Not Found
  $view = new ViewDto('404.twig', ['message' => 'Page not found']);
}

// Render the view if it's not null
if ($view !== null) {
  $viewRenderer->render($view);
}