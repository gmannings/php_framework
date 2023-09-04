<?php

namespace php_framework\dynamic_routes\controllers;

use php_framework\dynamic_routes\router\RouteAnnotation;
use php_framework\dynamic_routes\views\ViewDto;

class HomeController extends BaseController implements ControllerInterface {

  #[RouteAnnotation(path: '/', method: 'GET')]
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