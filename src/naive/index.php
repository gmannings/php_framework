<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  echo "Welcome, " . $_SESSION['username'] . "! <a href='logout.php'>Logout</a>";
} else {
  echo "Welcome to our website! Please <a href='login.php'>login</a> to access your account.";
}
