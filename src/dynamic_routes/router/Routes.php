<?php

namespace php_framework\dynamic_routes\router;

class Routes {

  /**
   * @var array
   */
  protected array $routes = [];

  /**
   * @param \php_framework\dynamic_routes\router\Route $route
   *
   * @return void
   */
  public function addRoute(Route $route): void {
    $this->routes[$route->path] = $route;
  }

  /**
   * @return \php_framework\dynamic_routes\router\Route[]
   */
  public function getRoutes(): array {
    return $this->routes;
  }

}