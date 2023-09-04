<?php

namespace php_framework\dynamic_routes\controllers;

use php_framework\dynamic_routes\model\UserLoginDto;
use php_framework\dynamic_routes\router\RouteAnnotation;
use php_framework\dynamic_routes\services\UserService;
use php_framework\dynamic_routes\views\ViewDto;

class LoginController extends BaseController implements ControllerInterface {

  /**
   * @var \php_framework\dynamic_routes\services\UserService
   */
  protected UserService $userService;

  public function __construct() {
    // For now, we will instantiate the UserService here. There are better
    // approaches we will use as the framework grows.
    $this->userService = new UserService();
  }

  /**
   * @return \php_framework\dynamic_routes\views\ViewDto
   */
  #[RouteAnnotation(path: '/login', method: 'GET')]
  public function challenge(): ViewDto {
    if ($this->isLoggedIn()) {
      $this->redirectTo('/');
    }
    return new ViewDto('login.twig');
  }

  /**
   * @return \php_framework\dynamic_routes\views\ViewDto
   */
  #[RouteAnnotation(path: '/process', method: 'POST')]
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
  #[RouteAnnotation(path: '/logout', method: 'GET')]
  public function logout(): void {
    session_destroy();
    $this->redirectTo('/');
  }

}