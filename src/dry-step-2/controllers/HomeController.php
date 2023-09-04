<?php

class HomeController extends BaseController {

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