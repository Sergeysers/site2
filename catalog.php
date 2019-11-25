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
   <p><a href="aut.php" style="color:#81BEF7;">Войдите</a> или <a href="reg.php" style="color:#81BEF7;">зарегистрируйтесь</a>, чтобы получить доступ к заказам и скидкам!</p>
   <?php else: ?>
    <p> Приветствуем Вас, <?=$_COOKIE['user']?>. Чтобы выйти, нажмите <a href="exit.php">здесь</a>.</p>
   <?php endif; ?>
  </div>
  <div class="menu">
   <p align=center> <a href="contact.php" style="padding: 10px 5% 10px;">Контакты/Адрес</a>
                    <a href="aboutus.php" style="padding: 10px 5% 10px ;">О нас</a> 
	                <a href="main.php" style="padding: 10px 10% 10px 5%;">Главная</a>
	                <b style="color:#BDBDBD;">Каталог</b>
	                <a href="shop.php" style="padding: 10px 5% 10px 10%;">Купить</a>
				    <a href="comments.php" style="padding: 10px 5% 10px;">Отзывы</a></p>
  </div>
  <div class="coffee" align=center>
     <form action="" method="POST" align=right>
      <p>Сортировка: 
	 <select name="sort" size="1">
      <option value="Тип">Тип</option>
      <option value="Производитель">Производитель</option>
	  <option value="Цена">Цена</option>
	  <option value="Оценка">Оценка</option>
     </select></p>
	     <input type="submit" value="Подтвердить">
   </form> 
  <?php
  
    $sort = filter_var(trim($_POST['sort']),
    FILTER_SANITIZE_STRING);
    $mysql = new mysqli('localhost','root','','registersite');

    if ($sort == "Тип") {
    $query ="SELECT `type`,`namepr`,`gen`,`cost250`,`cost350`,`cost450`, `stat` 
	FROM `catalog` ORDER BY `type`";
 
$result = mysqli_query($mysql, $query); 
if($result)
{
    $rows = mysqli_num_rows($result); 
     
    echo "<table><tr><th>Тип продукта</th><th>Имя продукта</th><th>Производитель</th><th>Цена(250мл)</th><th>Цена(350мл)</th><th>Цена(450мл)</th><th>Средняя оценка</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 7 ; ++$j) echo '<td><a href="card.php" style="width: 100%; left: 0px; height: 1.5em;">'.$row[$j].'</a></td>';
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}
mysqli_close($mysql);
} elseif ($sort == "Производитель") {
	    $query ="SELECT `type`,`namepr`,`gen`,`cost250`,`cost350`,`cost450`, `stat` 
	FROM `catalog` ORDER BY `gen`";
 
$result = mysqli_query($mysql, $query); 
if($result)
{
    $rows = mysqli_num_rows($result); 
     
    echo "<table><tr><th>Тип продукта</th><th>Имя продукта</th><th>Производитель</th><th>Цена(250мл)</th><th>Цена(350мл)</th><th>Цена(450мл)</th><th>Средняя оценка</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 7 ; ++$j) echo '<td><a href="card.php" style="width: 100%; left: 0px; height: 1.5em;">'.$row[$j].'</a></td>';
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}
mysqli_close($mysql);
} elseif ($sort == "Цена") {
	$query ="SELECT `type`,`namepr`,`gen`,`cost250`,`cost350`,`cost450`, `stat` 
	FROM `catalog` ORDER BY `cost250`";
 
$result = mysqli_query($mysql, $query); 
if($result)
{
    $rows = mysqli_num_rows($result); 
     
    echo "<table><tr><th>Тип продукта</th><th>Имя продукта</th><th>Производитель</th><th>Цена(250мл)</th><th>Цена(350мл)</th><th>Цена(450мл)</th><th>Средняя оценка</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 7 ; ++$j) echo '<td><a href="card.php" style="width: 100%; left: 0px; height: 1.5em;">'.$row[$j].'</a></td>';
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}
mysqli_close($mysql);
} else {
	$query ="SELECT `type`,`namepr`,`gen`,`cost250`,`cost350`,`cost450`, `stat` 
	FROM `catalog` ORDER BY `stat`";
 
$result = mysqli_query($mysql, $query); 
if($result)
{
    $rows = mysqli_num_rows($result); 
     
    echo "<table><tr><th>Тип продукта</th><th>Имя продукта</th><th>Производитель</th><th>Цена(250мл)</th><th>Цена(350мл)</th><th>Цена(450мл)</th><th>Средняя оценка</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 7 ; ++$j) echo '<td><a href="card.php" style="width: 100%; left: 0px; height: 1.5em;">'.$row[$j].'</a></td>';
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}
mysqli_close($mysql);
}
?>
		
  </div>
  
  <div class="footer" align=center>
  
  <?php 

    error_reporting(0);
   
    $mysql = new mysqli('localhost','root','','registersite');
	
	$name=$_COOKIE['user'];
	$stmt = $mysql->prepare("SELECT `admin` FROM `users` WHERE `name`= ? "); 
            $stmt->bind_param('i', $name); 
            $stmt->execute(); 
            $stmt->bind_result($admin);
            $stmt->fetch();
	if(!empty($admin)):
    ?>
    <p><a href="addcatalog.php" style="color:#81BEF7;">Добавление продукта</a></p>
   <?php else: ?>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
      <?php endif; 
	   $mysql->close();?> 
  </div>
 </body>
</html>