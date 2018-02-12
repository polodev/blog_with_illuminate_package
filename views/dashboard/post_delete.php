<?php require 'partials/header.php'; ?>
<?php 
$id = $_GET['id'] ;
Post::find($id)->delete();
header("Location: /dashboard/home?deleted=yes");
