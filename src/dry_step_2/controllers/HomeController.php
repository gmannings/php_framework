<?php

namespace php_framework\dry_step_2\controllers;

use php_framework\dry_step_2\views\ViewDto;

class HomeController extends BaseController implements ControllerInterface {

  public function index(): ViewDto {
    return new ViewDto(
      'index.twig',
      [
        'logged_in' => $this->isLoggedIn(),
        'username' => $_SESSION['username'] ?? '',
      ]
    );
  }

}