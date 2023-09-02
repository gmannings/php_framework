<?php

class ViewDto {

  public function __construct(readonly string $template, readonly array $data = []) {
  }

}