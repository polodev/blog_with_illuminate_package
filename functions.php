<?php
use Carbon\Carbon;

$app_url = 'localhost:8000';

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

function is_email_exists($email) {
   $user = User::where('email', $email)->first();
   return !empty($user);
}

function register_user($data) {
  $user = new User;
  $user->name = $data['name'];
  $user->email = $data['email'];
  $user->password = $data['password'];
  $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
  $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
  $user->save();
  $_SESSION['user'] = $user;
  header('Location: /');
}