<?php

namespace php_framework\dry_step_2\controllers;

abstract class BaseController {

  /**
   * Redirect the user to a different PHP file.
   *
   * @param string $location
   *
   * @return void
   */
  protected function redirectTo(string $location): void {
    header("Location: ${location}");
    exit;
  }

  /**
   * @return bool
   */
  public function isLoggedIn(): bool {
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
  }

}