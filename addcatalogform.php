<?php
  $type = filter_var(trim($_POST['type']),
  FILTER_SANITIZE_STRING);
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
  $photo = filter_var(trim($_POST['photo']),
  FILTER_SANITIZE_STRING);

 $mysql = new mysqli('localhost','root','','registersite');
 
 $mysql->query("INSERT INTO `catalog` (`type`,`namepr`,`descr`,`gen`,`cost250`,`cost350`,`cost450`,`photo`)
 VALUES('$type','$namepr','$descr','$gen','$cost250','$cost350','$cost450','$photo')"); 
 
 $mysql->close();
 header('Location:cong.php');
?>