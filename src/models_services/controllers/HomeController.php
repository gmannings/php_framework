<?php

namespace php_framework\models_services\controllers;

use php_framework\models_services\views\ViewDto;

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