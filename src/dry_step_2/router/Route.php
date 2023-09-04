<?php

namespace php_framework\dry_step_2\router;

use php_framework\dry_step_2\controllers\ControllerInterface;

class Route {

  public function __construct(
    public string $path,
    public ControllerInterface $controller,
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
   * @return \php_framework\dry_step_2\controllers\ControllerInterface
   */
  public function getController(): ControllerInterface {
    return $this->controller;
  }

  /**
   * @return string
   */
  public function getAction(): string {
    return $this->action;
  }

}