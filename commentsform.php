<?php
  $com = filter_var(trim($_POST['com']),
  FILTER_SANITIZE_STRING);
  $name=$_COOKIE['user'];
  $email=$_COOKIE['email'];

  $mysql = new mysqli('localhost','root','','registersite');
  $mysql->query("INSERT INTO `comments` (`com`,`name`,`email`)
  VALUES('$com', '$name', '$email')"); 
 
  $mysql->close();
  header('Location:comments.php');
?>