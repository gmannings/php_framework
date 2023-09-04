<?php

namespace php_framework\dynamic_routes\services;

use php_framework\dynamic_routes\model\Page;

class PageService {

  /**
   * @var Page[]
   */
  protected array $pages = [];

  public function __construct() {

    // Dummy data - this would normally be brought in from a DB, but we don't
    // need that yet.
    $this->pages[1] = new Page(
      1,
      'Page 1',
      'Page 1 content',
    );

    $this->pages[2] = new Page(
      2,
      'Page 2',
      'Page 2 content',
    );
  }

  /**
   * Get a page by ID or NULL if it does not exist.
   *
   * @param int $id
   *
   * @return \php_framework\dynamic_routes\model\Page|null
   */
  public function getPageById(int $id): ?Page {
    return $this->pages[$id] ?? NULL;
  }

}