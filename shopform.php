<?php
  $drink = filter_var(trim($_POST['drink']),
  FILTER_SANITIZE_STRING);
  $size = filter_var(trim($_POST['size']),
  FILTER_SANITIZE_STRING);
  $count = filter_var(trim($_POST['count']),
  FILTER_SANITIZE_STRING);
  $time = filter_var(trim($_POST['time']),
  FILTER_SANITIZE_STRING);
  $email = $_COOKIE['email'];
  $name = $_COOKIE['user'];

  $mysql = new mysqli('localhost','root','','registersite');
 
  $mysql->query("INSERT INTO `shop` (`drink`,`size`,`count`,`time`,`email`,`name`)
  VALUES('$drink','$size','$count','$time','$email','$name')"); 
 
  $mysql->close();
  header('Location:cong.php');
?>