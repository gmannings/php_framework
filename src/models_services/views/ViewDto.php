<?php

namespace php_framework\models_services\views;

class ViewDto {

  public function __construct(readonly string $template, readonly array $data = []) {
  }

}