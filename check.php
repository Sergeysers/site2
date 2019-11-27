<?php
  $email = filter_var(trim($_POST['email']),
  FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $password = filter_var(trim($_POST['password']),
  FILTER_SANITIZE_STRING);
  $confpass = filter_var(trim($_POST['confpass']),
  FILTER_SANITIZE_STRING);
  if ($password!=$confpass) {
	echo "Пароли не совпадают!";
    exit();
  }
  $mysql = new mysqli('localhost','root','','registersite');
  $query ="SELECT `email` FROM `users`";
 
  $result = mysqli_query($mysql, $query); 
     if ($email==$result) {
      echo "На данную почту уже зарегистрирован аккаунт!";
	  echo '<p><a href="main.php">'."Вернуться на главную страницу".'</a></p>';
	  exit();
     }
    mysqli_free_result($result);
    mysqli_close($mysql);

 $mysql = new mysqli('localhost','root','','registersite');
 $mysql->query("INSERT INTO `users` (`email`,`name`,`password`,`admin`)
 VALUES('$email', '$name', '$password', '$admin')"); 
 
 $mysql->close();
 header('Location:cong.php');
?>