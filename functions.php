<?php

function is_authenticate() {
  return isset( $_SESSION['user'] );
}

function authenticate() {
  if (!isset( $_SESSION['user'] )) {
    header('Location: /login');
  }
}

function guest() {
  if (isset( $_SESSION['user'] )) {
    header('Location: /dashboard');
  }
}


function is_email ($email) {
  return preg_match("/.+@.+\..+/", $email) ;
}