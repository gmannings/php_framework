<?php

require_once '../../vendor/autoload.php';
require_once 'controllers/BaseController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'views/ViewRenderer.php';
require_once 'views/ViewDto.php';
require_once 'utils.php';

session_start();

const BASE_DIR = __DIR__;

function is_logged_in() {
  return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
}

// Set up Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

// Set up ViewRenderer
$viewRenderer = new ViewRenderer(
  $twig
);

// Set up Controllers
$loginController = new LoginController();
$homeController = new HomeController();
