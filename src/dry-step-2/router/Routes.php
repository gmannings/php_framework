<?php

class Routes {

  /**
   * @var array
   */
  protected array $routes = [];

  /**
   * @param \Route $route
   *
   * @return void
   */
  public function addRoute(Route $route): void {
    $this->routes[$route->path] = $route;
  }

  /**
   * @return \Route[]
   */
  public function getRoutes(): array {
    return $this->routes;
  }

}