<?php

namespace php_framework\dynamic_routes\controllers;

use php_framework\dynamic_routes\router\RouteAttribute;
use php_framework\dynamic_routes\services\PageService;
use php_framework\dynamic_routes\views\ViewDto;

class PageController extends BaseController implements ControllerInterface {

  protected PageService $pageService;

  public function __construct() {
    $this->pageService = new PageService();
  }

  #[RouteAttribute(path: '/page/{pageId}', method: 'GET')]
  public function index($id): ViewDto {

    $page = $this->pageService->getPageById($id);

    if (!is_null($page)) {
      return new ViewDto(
        'page.twig',
        [
          'title' => $page->title,
          'content' => $page->content,
        ]
      );
    }
    else {
      header("HTTP/1.1 404 Not Found");
      return new ViewDto('404.twig', ['message' => 'Page not found']);
    }

  }

}