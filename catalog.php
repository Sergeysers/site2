
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
   <p align=center> <a href="main.php">Вернуться на главную страницу</a></p>
   <?php else: ?>
    <p> Приветствуем Вас, <?=$_COOKIE['user']?>. Чтобы выйти, нажмите <a href="exit.php">здесь</a>.</p>
  </div>
  <div class="menu">
   <p align=center> <a href="contact.php" style="padding: 10px 5% 10px;">Контакты/Адрес</a>
                    <a href="aboutus.php" style="padding: 10px 5% 10px ;">О нас</a> 
	                <a href="main.php" style="padding: 10px 10% 10px 5%;">Главная</a>
	                <b style="color:#BDBDBD;">Каталог</b>
	                <a href="shop.php" style="padding: 10px 5% 10px 10%;">Купить</a>
				    <a href="comments.php" style="padding: 10px 5% 10px;">Отзывы</a></p>
  </div>
  <div class="coffee">
    <?php
  $type = filter_var(trim($_POST['type']),
  FILTER_SANITIZE_STRING);
  $namepr = filter_var(trim($_POST['namepr']),
  FILTER_SANITIZE_STRING);
  $descr = filter_var(trim($_POST['descr']),
  FILTER_SANITIZE_STRING);
  $gen = filter_var(trim($_POST['gen']),
  FILTER_SANITIZE_STRING);
  $cost250 = filter_var(trim($_POST['cost250']),
  FILTER_SANITIZE_STRING);
  $cost350 = filter_var(trim($_POST['cost350']),
  FILTER_SANITIZE_STRING);
  $cost450 = filter_var(trim($_POST['cost450']),
  FILTER_SANITIZE_STRING);
  $photo = filter_var(trim($_POST['photo']),
  FILTER_SANITIZE_STRING);
  $stat = filter_var(trim($_POST['sort']),
  FILTER_SANITIZE_STRING);
  
$mysql = new mysqli('localhost','root','','registersite');
$query ="SELECT `photo`,`namepr`,`type`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog`";
 
$result = mysqli_query($mysql, $query); 
if($result)
 $rows = "";
    while($rows = $result->fetch_assoc()){
		echo "<link rel='stylesheet' href='table.css'>";
		echo "<table>";
		echo "<tr><td rowspan=6>";
		echo "<img src=\"data:image/png;base64,".base64_encode($rows["photo"])."\" />";
		echo "</td>";
		echo "<td><b>".$rows["namepr"]."</b></td>";
		echo "</tr>";
        echo "<tr><td colspan=3>".$rows["type"]."</td></tr>";
        echo "<tr><td colspan=3> Производство: ".$rows["gen"]."</td></tr>";  
        echo "<tr><td colspan=3>".$rows["descr"]."</td></tr>"; 
 		echo "<tr>";
        echo "<td> Цена (250мл): ".$rows["cost250"]."</td>"; 
        echo "<td> Цена (350мл): ".$rows["cost350"]."</td>";
        echo "<td> Цена (450мл): ".$rows["cost450"]."</td>";
		echo "</tr>"; 
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
   <?php else: ?>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
      <?php endif; 
	   $mysql->close();?> 
  </div>
 </body>
 <?php endif; ?>
</html>