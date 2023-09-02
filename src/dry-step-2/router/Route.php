<?php

class Route {

  public function __construct(
    public string $path,
    public BaseController $controller,
    public string $action,
  ) {
  }

}