<?php 
require 'vendor/autoload.php';
session_start();
 $path = parse_url( trim( $_SERVER['REQUEST_URI'], '/' ), PHP_URL_PATH);

 $routes = [
  '' => 'views/front_end/home.php',
  'about' => 'views/front_end/about.php',
  'author' => 'views/front_end/author.php',
  'category' => 'views/front_end/category.php',
  'post' => 'views/front_end/post.php',
  'register' => 'views/front_end/register.php',
  'login' => 'views/front_end/login.php',
  'logout' => 'views/front_end/logout.php',
  'dashboard/home' => "views/dashboard/home.php",
 ];

 $auth_routes = [];
 $guest_routes = [];

 if (array_key_exists($path, $routes)) {
  require $routes[$path] ;
 }else {
  require 'views/notfound.php';
 }