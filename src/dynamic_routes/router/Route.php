<?php

namespace php_framework\dynamic_routes\router;

class Route {

  public function __construct(
    readonly string $controller,
    readonly string $method,
    readonly RouteAnnotation $routeAnnotation,
  ) {
  }

}