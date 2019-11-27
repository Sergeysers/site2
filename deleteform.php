<?php
  $name=$_COOKIE['user'];
  $email=$_COOKIE['email'];
  
  $mysql = new mysqli('localhost','root','','registersite');
 
  $mysql->query("DELETE FROM `users` WHERE `name`='$name' AND `email`='$email'");

  $mysql->close();
  header('Location:cong.php');
   
  setcookie('user', $user['name'], time() - 259200, "/");
  setcookie('email', $user['email'], time() - 259200, "/");
  setcookie('admin', $user['admin'], time() - 259200, "/");
?>