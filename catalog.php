
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title> Каталог </title>
  <link rel="stylesheet" href="stylecat.css">
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
                    <a href="aboutus.php" style="padding: 10px 5% 10px ;">О нас</a> 
	                <a href="main.php" style="padding: 10px 10% 10px 5%;">Главная</a>
	                <b style="color:#BDBDBD;">Каталог</b>
	                <a href="shop.php" style="padding: 10px 5% 10px 10%;">Купить</a>
				    <a href="comments.php" style="padding: 10px 5% 10px;">Комментарии/Отзывы</a></p>
  </div>
  <div class="coffee">
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
   <form action="" method="POST">
    <select name="sort" size="1">
    <p>Сортировка:
	 <option value="Цена">Цена</option>
	 <option value="Производитель">Производитель</option>
	 <option value="Алфавит">Алфавит</option>
	</select></p>
	<input type="submit" value="Подвтвердить">
    <?php

  
$mysql = new mysqli('localhost','root','','registersite');

if ($sort == "Цена") {
$query ="SELECT `photo`,`namepr`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog` ORDER BY `cost250` ";}
elseif ($sort == "Производитель") {
$query ="SELECT `photo`,`namepr`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog` ORDER BY `descr` ";}
elseif ($sort == "Алфавит") {
$query ="SELECT `photo`,`namepr`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog` ORDER BY `namepr` ";}
elseif ($sort == "") {
$query ="SELECT `photo`,`namepr`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog` ";}
 
$result = mysqli_query($mysql, $query); 
if($result)
 $rows = "";
    while($rows = $result->fetch_assoc()){
		echo '<table class="table">';
		echo '<tr><td rowspan=5>';
		?>
		<div class='photo'>
		<?php
		echo '<img src=\'data:image/jpg;base64,'.base64_encode($rows['photo']).'\' />';
		?>
		</div>
		<?php
		echo "</td>";
		echo "<td><b>".$rows["namepr"]."</b></td>";
		echo "</tr>";
        echo "<tr><td colspan=3> Производство: ".$rows["gen"]."</td></tr>";  
        echo "<tr><td colspan=3>".$rows["descr"]."</td></tr>"; 
 		echo "<tr>";
        echo "<td> Цена (250мл): ".$rows["cost250"]."</td>"; 
        echo "<td> Цена (350мл): ".$rows["cost350"]."</td>";
        echo "<td> Цена (450мл): ".$rows["cost450"]."</td>";
		echo "</tr>"; 
		echo '<hr align="center" width="30%" size="2" color="brown" />';
        echo "</table>";	
	}

    mysqli_free_result($result);
mysqli_close($mysql);
?>
  </div>
  
  <div class="footer" align=center>
  
  <?php 
    error_reporting(0);
   
    $mysql = new mysqli('localhost','root','','registersite');
	
	$admin=$_COOKIE['admin'];
	if(!empty($admin)):
    ?>
    <p><a href="addcatalog.php" style="color:#81BEF7;">Добавление продукта</a></p>
	<p><a href="deletecatalog.php" style="color:#81BEF7;">Удаление продукта</a></p>
   <?php else: ?>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
      <?php endif; 
	   $mysql->close();?> 
  </div>
 </body>
 <?php endif; ?>
</html>