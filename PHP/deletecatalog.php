<html>
 <head>
  <meta charset="utf-8">
  <title> Удаление продукта </title>
  <link rel="stylesheet" href="styleaut.css">
 </head>
 <body>
  <div class="header">
   <h1><em> Cofeйня </em></h1>
  </div>
  <div class="menu">
   <p align=center> <a href="main.php" style="padding: 10px 5% 10px;">Вернуться на главную страницу</a></p>
  </div>
  <div class="main" style="text-align:center">
   <form action="deletecatalogform.php" method="POST">
    <p>Наименование удаляемого продукта: <input type="text" name="namepr" required></p>
    <input type="submit" value="Подтвердить">
   </form> 
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