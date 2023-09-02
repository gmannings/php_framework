<?php

include 'utils.php';

echo $twig->render('index.twig', [
  'logged_in' => is_logged_in(),
  'username' => $_SESSION['username'] ?? ''
]);