<?php
session_start();

$users = [
  'admin' => 'password123',  // You can add more users here
];

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($users[$username]) && $users[$username] == $password) {
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
  header('Location: index.php');
} else {
  echo "Invalid credentials! <a href='login.php'>Try again</a>";
}