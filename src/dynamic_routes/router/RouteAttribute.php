<?php

namespace php_framework\dynamic_routes\router;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class RouteAttribute {

  public function __construct(
    readonly string $path,
    readonly string $method = 'GET'
  ) {}

}