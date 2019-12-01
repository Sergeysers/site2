<?php
  $idban = filter_var(trim($_POST['idban']),
  FILTER_SANITIZE_STRING);
  $ban = filter_var(trim($_POST['ban']),
  FILTER_SANITIZE_STRING);
  $reason = filter_var(trim($_POST['reason']),
  FILTER_SANITIZE_STRING);
  
  $mysql = new mysqli('localhost','root','','registersite');
 
  $mysql->query("UPDATE `users` SET `ban`='$ban',`reason`='$reason' WHERE `id`='$idban' ");
  $mysql->close();
  header('Location:cong.php');
   
?>