<?php

class LoginController extends BaseController {

  /**
   * @return \ViewDto
   */
  public function challenge(): ViewDto {
    if (is_logged_in()) {
      $this->redirectTo('index.php');
    }
    return new ViewDto('login.twig');
  }

  /**
   * @return \ViewDto
   */
  public function process(): ViewDto {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] == $password) {
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['username'] = $username;
      $this->redirectTo('index.php');
    }
    return new ViewDto('login-error.twig');
  }

  /**
   * @return void
   */
  public function logout(): void {
    session_destroy();
    $this->redirectTo('index.php');
  }

}