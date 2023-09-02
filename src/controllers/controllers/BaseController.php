<?php

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

}