 <?php
 setcookie('user', $user['name'], time() - 259200, "/");
 header('Location:main.php');
 ?>