<?php
  $iddel = filter_var(trim($_POST['iddel']),
  FILTER_SANITIZE_STRING);
  
  $mysql = new mysqli('localhost','root','','registersite');
 
  $mysql->query("DELETE FROM `comments` WHERE `id`='$iddel'");

  $mysql->close();
  header('Location:cong.php');
   
?>