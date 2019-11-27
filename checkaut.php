<?php
 $email = filter_var(trim($_POST['email']),
 FILTER_SANITIZE_STRING);
 $password = filter_var(trim($_POST['password']),
 FILTER_SANITIZE_STRING);
 
 $mysql = new mysqli('localhost','root','','registersite');
 
 $result = $mysql->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");
 $user = $result->fetch_assoc();
 error_reporting(0);
 if(count($user) == 0) {
	 echo "Неверно введёная почта и/или пароль!";
	 echo '<p><a href="main.php">'."Вернуться на главную страницу".'</a></p>';
	 exit();
 }
 
 setcookie('user', $user['name'], time() + 259200, "/");
 setcookie('email', $user['email'], time() + 259200, "/");
 setcookie('admin', $user['admin'], time() + 259200, "/");

 $mysql->close();
 header('Location:main.php');
?>