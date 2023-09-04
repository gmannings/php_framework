<?php

class Route {

  public function __construct(
    public string $path,
    public BaseController $controller,
    public string $action,
  ) {
  }

  /**
   * @return string
   */
  public function getPath(): string {
    return $this->path;
  }

  /**
   * @return \BaseController
   */
  public function getController(): BaseController {
    return $this->controller;
  }

  /**
   * @return string
   */
  public function getAction(): string {
    return $this->action;
  }

}