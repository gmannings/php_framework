<?php

namespace php_framework\models_services\model;

class UserModel {

  public function __construct(
    protected string $username,
    protected string $password,
    protected bool $isLoggedIn = FALSE,
  ) {
  }

  /**
   * @return string
   */
  public function getUsername(): string {
    return $this->username;
  }

  /**
   * @return string
   */
  public function getPassword(): string {
    return $this->password;
  }

  /**
   * @return bool
   */
  public function isLoggedIn(): bool {
    return $this->isLoggedIn;
  }

  /**
   * @param bool $isLoggedIn
   */
  public function setIsLoggedIn(bool $isLoggedIn): void {
    $this->isLoggedIn = $isLoggedIn;
  }

}