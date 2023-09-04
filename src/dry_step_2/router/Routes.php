<?php

namespace php_framework\dry_step_2\router;

class Routes {

  /**
   * @var array
   */
  protected array $routes = [];

  /**
   * @param \php_framework\dry_step_2\router\Route $route
   *
   * @return void
   */
  public function addRoute(Route $route): void {
    $this->routes[$route->path] = $route;
  }

  /**
   * @return \php_framework\dry_step_2\router\Route[]
   */
  public function getRoutes(): array {
    return $this->routes;
  }

}