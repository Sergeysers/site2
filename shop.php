<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title> Купить </title>
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
   <p align=center> <a href="contact.php" style="padding: 10px 5% 10px;">Контакты/Адрес</a>
                    <a href="aboutus.php" style="padding: 10px 5% 10px;">О нас</a> 
	                <a href="main.php" style="padding: 10px 5% 10px 5%;">Главная</a>
	                <a href="catalog.php" style="padding: 10px 10% 10px 5%;">Каталог</a>
	                <b style="color:#BDBDBD;">Купить</b>
					<a href="comments.php" style="padding: 10px 5% 10px 10%;">Комментарии/Отзывы</a></p>
  </div>
  <div class="main" style="text-align:center">
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
   <p> При заказе с сайта все виды кофе стоят 70/110/150 рублей за 250/350/450 мл соответственно! </p>
   <form action="shopform.php" method="POST">
    <p>Напиток: 
     <select name="drink" size="1">
	 <?php
$mysql = new mysqli('localhost','root','','registersite');


$query ="SELECT `namepr` FROM `catalog`";

$result = mysqli_query($mysql, $query); 
if($result)
 $rows = "";
    while($rows = $result->fetch_assoc()){

		echo "<option value=".$rows["namepr"].">".$rows["namepr"]."</option>";
				
	}

    mysqli_free_result($result);
mysqli_close($mysql);
?>
     </select></p>
    <p>Размер стаканчика: 
     <select name="size" size="1">
      <option value="250ml">Маленький(250мл)</option>
      <option value="350ml">Средний(350мл)</option>
      <option value="450ml">Большой(450мл)</option>
     </select></p>
    <p>Количество: 
     <select name="count" size="1">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
     </select></p>
     <p>Время: <input type="time" name="time" min="05:15" max="22:45" required/></p>
    <input type="submit" value="Подтвердить">
    <p> Заказ будет ожидать в указанное вами время сегодня, по данному адрусу: Б.Грузинская ул., д.76, г.Москва. </br>
        Назовите баристе все введенные вами данные (в том числе и имя), чтобы получить заказ. </p>
   </form> 
  </div>
  <div class="footer"  align=center>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
  </div>
  <?php endif; ?>
 </body>
</html>