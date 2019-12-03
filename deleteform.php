<?php
  $iddelacc = filter_var(trim($_POST['iddelacc']),
  FILTER_SANITIZE_STRING);
  
  $mysql = new mysqli('localhost','root','','registersite');
 
  $mysql->query("DELETE FROM `users` WHERE `id`='$iddelacc'");

  $mysql->close();
  header('Location:cong.php');
?>