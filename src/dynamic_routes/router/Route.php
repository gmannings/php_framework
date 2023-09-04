<?php

namespace php_framework\dynamic_routes\router;

class Route {

  public function __construct(
    readonly string         $controller,
    readonly string         $action,
    readonly RouteAttribute $routeAnnotation,
    protected array         $urlPortions = [],
  ) {
  }

  /**
   * @return array
   */
  public function getUrlPortions(): array {
    return $this->urlPortions;
  }

  /**
   * @param array $urlPortions
   */
  public function setUrlPortions(array $urlPortions): void {
    $this->urlPortions = $urlPortions;
  }

}