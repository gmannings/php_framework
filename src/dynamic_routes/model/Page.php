<?php

namespace php_framework\dynamic_routes\model;

class Page {

  public function __construct(
    readonly int $id,
    readonly string $title,
    readonly string $content,
  ) {
  }

}