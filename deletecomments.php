<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title> Удаление комментариев </title>
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
  <div class="header">
   <h1><em> Cofeйня </em></h1>
  </div>
  <div class="register">
    <?php 
   error_reporting(0);
   if($_COOKIE['user'] == ''):
     ?>
   <p><a href="aut.php" style="color:#81BEF7;">Войдите</a> или <a href="reg.php" style="color:#81BEF7;">зарегистрируйтесь</a>, чтобы получить доступ к заказам, каталогу, отзывам и скидкам!</p>
   </div>
  <div class="menu">
   <p align=center> <a href="main.php" style="padding: 10px 5% 10px;">Вернуться на главную страницу</a></p>
  </div>
   <div align=center>
   <p style="color:white;"><a href="aut.php" style="color:#81BEF7;">Войдите</a>, чтобы получить доступ к данной странице!</p>
   </div>
   <div class="footer" align=center>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
   </div>
   <?php else: ?>
    <p> Приветствуем Вас, <?=$_COOKIE['user']?>. Чтобы выйти, нажмите <a href="exit.php">здесь</a>.</p>
  </div>
  <div class="menu">
   <p align=center> <a href="main.php" style="padding: 10px 5% 10px;">Вернуться на главную страницу</a></p>
  </div>
  <div class="main" align=center>
  <?php
  $mysql = new mysqli('localhost','root','','registersite');
  $query ="SELECT * FROM `comments`";
 
  $result = mysqli_query($mysql, $query); 
  if($result)
   $rows = "";
		echo "<table><tr><th>ID комментария</th><th>Имя пользователя</th><th>E-mail пользователя</th><th>Комментарий</th></tr>";
    while($rows = $result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$rows["id"]."</td>";
		echo "<td>".$rows["name"]."</td>";
		echo "<td>".$rows["email"]."</td>";
        echo "<td>".$rows["com"]."</td>";
		echo "</tr>"; 			
	}
	    echo "</table>";

    mysqli_free_result($result);
    mysqli_close($mysql);
?>
   <form action="deletecommentsform.php" method="POST">
    <p>Введите ID комментария, который вы хотите удалить: <input type="text" name="iddel" required></p>
   <input type="submit" value="Подтвердить">
   </form>
  </div>
  <div class="footer" align=center>
  
  <?php 
    error_reporting(0);
   
    $mysql = new mysqli('localhost','root','','registersite');
	
	$admin=$_COOKIE['admin'];
	if(!empty($admin)):
    ?>
	<p><a href="ban.php" style="color:#81BEF7;">Блокировка пользователей</a></p>
   <?php else: ?>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
      <?php endif; 
	   $mysql->close();?> 
  </div>
  <?php endif; ?>
 </body>
</html>