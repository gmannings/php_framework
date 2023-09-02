<?php

require_once '../../vendor/autoload.php';

session_start();

$users = [
  'admin' => 'password123',  // You can add more users here
];

function is_logged_in() {
  return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
}

function redirect_to($location) {
  header('Location: ' . $location);
  exit;
}

// Set up Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
