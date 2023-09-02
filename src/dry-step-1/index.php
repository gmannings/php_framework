<?php

include 'utils.php';

if (is_logged_in()) {
  echo "Welcome, ${$_SESSION['username']}! <a href='logout.php'>Logout</a>";
} else {
  echo "Welcome to our website! Please <a href='login.php'>login</a> to access your account.";
}
