<?php
 $email = filter_var(trim($_POST['email']),
 FILTER_SANITIZE_STRING);
 $password = filter_var(trim($_POST['password']),
 FILTER_SANITIZE_STRING);
 $date = date("Y-m-d");
 
 $mysql = new mysqli('localhost','root','','registersite');
 
 $result = $mysql->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");
 $user = $result->fetch_assoc();
 error_reporting(0);
 if(count($user) == 0) {
	 echo "Неверно введёная почта и/или пароль!";
	 echo '<p><a href="main.php">'."Вернуться на главную страницу".'</a></p>';
	 exit();
 } 

  $mysql2 = new mysqli('localhost','root','','registersite');
  $query ="SELECT `ban`,`reason` FROM `users` WHERE `email`='$email' AND `password`='$password'";
 
  $result2 = mysqli_query($mysql2, $query); 
  if($result2)
   $rows ="";
    while($rows = $result2->fetch_assoc()){ 
 if((!empty($rows["ban"])) AND $rows["ban"]>$date) {
	 echo "Вы заблокированы до ".$rows["ban"].".Причина: ".$rows["reason"];
	 echo '<p><a href="main.php">'."Вернуться на главную страницу".'</a></p>';
	 exit();
   }
  }
 
 setcookie('user', $user['name'], time() + 28800, "/");
 setcookie('email', $user['email'], time() + 28800, "/");
 setcookie('admin', $user['admin'], time() + 28800, "/");
 
 $mysql->close();
 header('Location:main.php');
?>