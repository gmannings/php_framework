<?php

namespace php_framework\dry_step_2\controllers;

use php_framework\dry_step_2\views\ViewDto;

class LoginController extends BaseController implements ControllerInterface {

  protected array $users = [
    'admin' => 'password123',  // You can add more users here
  ];

  /**
   * @return \php_framework\dry_step_2\views\ViewDto
   */
  public function challenge(): ViewDto {
    if ($this->isLoggedIn()) {
      $this->redirectTo('/');
    }
    return new ViewDto('login.twig');
  }

  /**
   * @return \php_framework\dry_step_2\views\ViewDto
   */
  public function process(): ViewDto {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($this->users[$username]) && $this->users[$username] == $password) {
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['username'] = $username;
      $this->redirectTo('/');
    }
    return new ViewDto('login-error.twig');
  }

  /**
   * @return void
   */
  public function logout(): void {
    session_destroy();
    $this->redirectTo('/');
  }

}