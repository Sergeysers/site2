 <?php
 setcookie('user', $user['name'], time() - 28800, "/");
 setcookie('email', $user['email'], time() - 28800, "/");
 setcookie('admin', $user['admin'], time() - 28800, "/");

 header('Location:main.php');
 ?>