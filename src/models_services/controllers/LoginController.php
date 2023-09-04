<?php

namespace php_framework\models_services\controllers;

use php_framework\models_services\model\UserLoginDto;
use php_framework\models_services\services\UserService;
use php_framework\models_services\views\ViewDto;

class LoginController extends BaseController implements ControllerInterface {

  /**
   * @var \php_framework\models_services\services\UserService
   */
  protected UserService $userService;

  public function __construct() {
    // For now, we will instantiate the UserService here. There are better
    // approaches we will use as the framework grows.
    $this->userService = new UserService();
  }

  protected array $users = [
    'admin' => 'password123',  // You can add more users here
  ];

  /**
   * @return \php_framework\models_services\views\ViewDto
   */
  public function challenge(): ViewDto {
    if ($this->isLoggedIn()) {
      $this->redirectTo('/');
    }
    return new ViewDto('login.twig');
  }

  /**
   * @return \php_framework\models_services\views\ViewDto
   */
  public function process(): ViewDto {
    $userLoginDto = UserLoginDto::fromArray($_POST);
    $user = $this->userService->authenticate($userLoginDto);

    if (!is_null($user)) {
      $_SESSION['loggedin'] = $user->isLoggedIn();
      $_SESSION['username'] = $user->getUsername();
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