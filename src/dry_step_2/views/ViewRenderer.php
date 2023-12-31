<?php

namespace php_framework\dry_step_2\views;

use Twig\Environment;

class ViewRenderer {

  /**
   * @param \Twig\Environment $twig
   */
  public function __construct(
    protected Environment $twig,
  ) {}

  /**
   * @param \php_framework\dry_step_2\views\ViewDto|null $view
   *
   * @return void
   * @throws \Twig\Error\LoaderError
   * @throws \Twig\Error\RuntimeError
   * @throws \Twig\Error\SyntaxError
   */
  public function render(?ViewDto $view = NULL): void {
    if (!is_null($view)) {
      echo $this->twig->render( $view->template, $view->data);
    }
  }

}
