<?php

namespace php_framework\dynamic_routes\model;

class UserLoginDto {

  public function __construct(
    protected string $username,
    protected string $password,
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
   * From an array of $_POST parameters, create this DTO.
   *
   * @param array $data
   *
   * @return static
   */
  public static function fromArray(array $data): self {
    return new self(
      $data['username'] ?? '',
      $data['password'] ?? ''
    );
  }

}