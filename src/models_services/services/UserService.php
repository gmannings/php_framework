<?php

namespace php_framework\models_services\services;

use php_framework\models_services\model\UserLoginDto;
use php_framework\models_services\model\UserModel;

class UserService {

  /**
   * @var UserModel[]
   */
  protected array $validUsers = [];

  public function __construct() {
    // We'll create some valid users here, where in reality we'd retrieve
    // them from a DB or other persistent store.
    $this->validUsers[] = new UserModel(
      'admin',
      'password123',
    );
  }

  /**
   * Authenticate a user against a supplied username and password securely.
   *
   * @param \php_framework\models_services\model\UserLoginDto $user
   *
   * @return \php_framework\models_services\model\UserModel|null
   */
  public function authenticate(UserLoginDto $user): ?UserModel {
    $matchingUsers = array_filter(
      $this->validUsers,
      fn(UserModel $validUser) => $validUser->getUsername() === $user->getUsername()
    );

    $matchingUser = array_pop($matchingUsers);

    if (!is_null($matchingUser)) {
      if (password_verify($user->getPassword(), $matchingUser->getPassword())) {
        $matchingUser->setIsLoggedIn(TRUE);
      }
    }

    return $matchingUser;
  }

}