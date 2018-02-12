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
  // guest routes
  'register' => 'views/front_end/register.php',
  'login' => 'views/front_end/login.php',
  // authenticate routes
  'logout' => 'views/front_end/logout.php',
  'dashboard/home' => "views/dashboard/home.php",
  'dashboard/post/create' => "views/dashboard/post_create.php",
  'dashboard/post/edit' => "views/dashboard/post_edit.php",
  'dashboard/post/delete' => "views/dashboard/post_delete.php",
  'dashboard/category' => "views/dashboard/category_home.php",
  'dashboard/category/create' => "views/dashboard/category_create.php",
  'dashboard/category/edit' => "views/dashboard/category_edit.php",
  'dashboard/category/delete' => "views/dashboard/category_delete.php",
 ];
$auth_routes = ['dashboard/home', 'dashboard/post/create', 'dashboard/post/edit', 'dashboard/post/delete', 'dashboard/category', 'dashboard/category/delete', 'logout']; 
$guest_routes = ['login', 'register'];

if (array_key_exists($path, $routes)) {
  if (in_array($path, $auth_routes)) {
    //first check user logged in 
    if (is_authenticate()) {
      // if yes require the view file
      require $routes[$path];
    }else {
    //if no, redirect to guest routes
      header('Location: /login');
    }
  }else if (in_array($path, $guest_routes)) {
    // first check user logged in 
    if (is_authenticate()) {
    // if yes redirect to dashboard home 
      header('Location: /dashboard/home');
    }else {
      require $routes[$path];
    }
    //  else show user guest routes
  }else {
    require $routes[$path] ;
  }

}else {
  require 'views/notfound.php';
}