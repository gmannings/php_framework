<?php

namespace php_framework\dynamic_routes\controllers;

use php_framework\dynamic_routes\router\RouteAttribute;
use php_framework\dynamic_routes\views\ViewDto;

class PageController extends BaseController implements ControllerInterface {

  #[RouteAttribute(path: '/page/{pageId}', method: 'GET')]
  public function index(): ViewDto {
    return new ViewDto(
      'page.twig',
      [
        'title' => 'Sample title',
        'content' => 'Content',
      ]
    );
  }

}