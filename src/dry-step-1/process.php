<?php
include 'utils.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($users[$username]) && $users[$username] == $password) {
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
  redirect_to('index.php');
} else {
  echo "Invalid credentials! <a href='login.php'>Try again</a>";
}