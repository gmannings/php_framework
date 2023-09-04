<?php

namespace php_framework\dynamic_routes\views;

class ViewDto {

  public function __construct(readonly string $template, readonly array $data = []) {
  }

}