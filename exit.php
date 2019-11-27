 <?php
 setcookie('user', $user['name'], time() - 259200, "/");
 setcookie('email', $user['email'], time() - 259200, "/");
 setcookie('admin', $user['admin'], time() - 259200, "/");
 header('Location:main.php');
 ?>