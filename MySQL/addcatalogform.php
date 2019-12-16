<?php
  $namepr = filter_var(trim($_POST['namepr']),
  FILTER_SANITIZE_STRING);
  $descr = filter_var(trim($_POST['descr']),
  FILTER_SANITIZE_STRING);
  $gen = filter_var(trim($_POST['gen']),
  FILTER_SANITIZE_STRING);
  $cost250 = filter_var(trim($_POST['cost250']),
  FILTER_SANITIZE_STRING);
  $cost350 = filter_var(trim($_POST['cost350']),
  FILTER_SANITIZE_STRING);
  $cost450 = filter_var(trim($_POST['cost450']),
  FILTER_SANITIZE_STRING);
  $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

 $mysql = new mysqli('localhost','root','','registersite');
 
 $mysql->query("INSERT INTO `catalog` (`namepr`,`descr`,`gen`,`cost250`,`cost350`,`cost450`,`photo`)
 VALUES('$namepr','$descr','$gen','$cost250','$cost350','$cost450','$photo')"); 
 
 $mysql->close();
 header('Location:cong.php');
?>