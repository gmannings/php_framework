<?php

namespace php_framework\dry_step_2\views;

class ViewDto {

  public function __construct(readonly string $template, readonly array $data = []) {
  }

}