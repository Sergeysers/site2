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
	 echo "На данную почту не зарегистрирован аккаунт.";
	 exit();
 }
 
 setcookie('user', $user['name'], time() + 259200, "/");

 $mysql->close();
 header('Location:main.php');
?>