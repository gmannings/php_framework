<?php

class HomeController {

  public function index(): ViewDto {
    return new ViewDto(
      'index.twig',
      [
        'logged_in' => is_logged_in(),
        'username' => $_SESSION['username'] ?? '',
      ]
    );
  }

}