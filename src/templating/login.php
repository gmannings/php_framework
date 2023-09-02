<?php
include 'utils.php';

if (is_logged_in()) {
  redirect_to('index.php');
}

echo $twig->render('login.twig');