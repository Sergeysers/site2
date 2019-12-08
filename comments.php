<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title> Комментарии/Отзывы </title>
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
   <p align=center> <a href="contact.php" style="padding: 10px 5% 10px 0%;">Контакты/Адрес</a>
                    <a href="aboutus.php" style="padding: 10px 5% 10px;">О нас</a> 
	                <a href="main.php" style="padding: 10px 5% 10px;">Главная</a>
	                <a href="catalog.php" style="padding: 10px 5% 10px;">Каталог</a>
	                <a href="shop.php" style="padding: 10px 10% 10px 5%;">Купить</a>
					<b style="color:#BDBDBD;">Комментарии/Отзывы</b></p>
  </div>
  <div class="main">
    <?php
  $email=$_COOKIE['email'];
  $user=$_COOKIE['user'];  
  error_reporting(0);
      $mysql2 = new mysqli('localhost','root','','registersite');
  $query ="SELECT `ban`,`reason` FROM `users` WHERE `email`='$email' AND `name`='$user'";
 
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
  ?>
  <?php
  $com = filter_var(trim($_POST['com']),
  FILTER_SANITIZE_STRING);
  $name=$_COOKIE['user'];
  $email=$_COOKIE['email'];
  
  $mysql = new mysqli('localhost','root','','registersite');
  $query ="SELECT `name`,`com` FROM `comments`";
 
  $result = mysqli_query($mysql, $query); 
  if($result)
   $rows = "";
    while($rows = $result->fetch_assoc()){
		echo "<table>";
		echo "<tr>";
		echo "<td><b>".$rows["name"].":</b></td>";
        echo "<td>".$rows["com"]."</td>";
		echo "</tr>"; 
        echo "</table>";				
	}

    mysqli_free_result($result);
mysqli_close($mysql);
?>
   <form action="commentsform.php" method="POST"  align=center>
   <label for="com">Ваш отзыв:</label>
   <textarea name="com" cols="60" rows="5"  required></textarea>
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
    <p><a href="deletecomments.php" style="color:#81BEF7;">Удаление комментариев</a></p>
	<p><a href="ban.php" style="color:#81BEF7;">Блокировка пользователей</a></p>
	<p><a href="delete.php" style="color:#81BEF7;"> Удаление пользователей</a></p>
   <?php else: ?>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
      <?php endif; 
	   $mysql->close();?> 
  </div>
  <?php endif; ?>
 </body>
</html>