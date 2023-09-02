<?php

class LoginController {

  /**
   * @return \ViewDto
   */
  public function challenge(): ViewDto {
    if (is_logged_in()) {
      redirect_to('index.php');
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
      redirect_to('index.php');
    }
    return new ViewDto('login-error.twig');
  }

  /**
   * @return void
   */
  public function logout(): void {
    session_destroy();
    redirect_to('index.php');
  }

}