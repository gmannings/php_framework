<?php

namespace php_framework\dynamic_routes\router;

use Attribute;
use php_framework\dynamic_routes\controllers\ControllerInterface;

#[Attribute(Attribute::TARGET_METHOD)]
class RouteAnnotation {

  public function __construct(
    readonly string $path,
    readonly string $method = 'GET'
  ) {}

}