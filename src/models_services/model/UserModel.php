<?php

namespace php_framework\models_services\model;

class UserModel {

  protected string $password;

  public function __construct(
    protected string $username,
    string $password,
    protected bool $isLoggedIn = FALSE,
  ) {
    $this->setPassword($password);
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
   * @param string $password
   */
  public function setPassword(string $password): void {
    $this->password = password_hash($password, PASSWORD_BCRYPT);
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