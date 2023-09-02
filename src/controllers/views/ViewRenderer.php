<?php

class ViewRenderer {

  public function __construct(protected Twig\Environment $twig) {}

  public function render(ViewDto $view) {
    echo $this->twig->render($view->template, $view->data);
  }

}
