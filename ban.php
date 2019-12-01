<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title> Блокировка пользователей </title>
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
  $query ="SELECT * FROM `users`";
 
  $result = mysqli_query($mysql, $query); 
  if($result)
   $rows = "";
		echo "<table><tr><th>ID пользователя</th><th>Имя пользователя</th><th>E-mail пользователя</th><th>Последний бан</th><th>Причина бана</th></tr>";
    while($rows = $result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$rows["id"]."</td>";
		echo "<td>".$rows["name"]."</td>";
		echo "<td>".$rows["email"]."</td>";
        echo "<td>".$rows["ban"]."</td>";
		echo "<td>".$rows["reason"]."</td>";
		echo "</tr>"; 			
	}
	    echo "</table>";

    mysqli_free_result($result);
    mysqli_close($mysql);
?>
   <form action="banform.php" method="POST">
    <p>Введите ID пользователя, который вы хотите заблокировать: <input type="text" name="idban" required></p>
	<p>
       <label for="ban">Дата, до которой пользователь будет заблокирован: </label>
       <input type="date" name="ban" required />
    </p>
	<p>Причина:<select name="reason" size="1" required>
      <option value="Спам">Спам</option>
      <option value="Осорбления/Клевета">Осорбления/Клевета</option>
    </select></p>
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
   <?php else: ?>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
      <?php endif; 
	   $mysql->close();?> 
  </div>
  <?php endif; ?>
 </body>
</html>