<?php

require_once '../../vendor/autoload.php';

use php_framework\dynamic_routes\router\Router;
use php_framework\dynamic_routes\views\ViewRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Set up Twig
$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

// Set up ViewRenderer
$viewRenderer = new ViewRenderer(
  $twig
);

$routes = new Router();
$routes->findControllersWithRoutes('./controllers');

session_start();

// Get the current URL path without the query string
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Check if the path exists in the routes and if so, call the associated controller action
$view = null;
if (!is_null($routes->getRouteByPath($urlPath))) {
  $route = $routes->getRouteByPath($urlPath);
  $controller = $route->controller;
  $action = $route->method;
  $view = $controller->$action();
} else {
  // Handle 404 Not Found
  $view = new ViewDto('404.twig', ['message' => 'Page not found']);
}

// Render the view if it's not null
if ($view !== null) {
  $viewRenderer->render($view);
}