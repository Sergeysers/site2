<html>
 <head>
  <meta charset="utf-8">
  <title> Добавление продукта </title>
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
   <form action="addcatalogform.php" method="POST">
    <p>Тип продукта: 
     <select name="type" size="1">
      <option value="Напитки">Напитки</option>
      <option value="Прочее">Прочее</option>n>
     </select></p>
    <p>Наименование продукта: <input type="text" name="namepr" required></p>
<label for="descr">Ваш комментарий:</label>
<textarea name="descr" cols="40" rows="5"></textarea>
    <p>Производитель: 
	 <select name="gen" size="1">
      <option value="Кофейня">Кофейня</option>
      <option value="Покупное">Покупное</option>
     </select></p>
	<p>Цена(250мл): <input type="text" name="cost250" required></p>
	<p>Цена(350мл): <input type="text" name="cost350" required></p>
	<p>Цена(450мл): <input type="text" name="cost450" required></p>
    <p>Фото товара: <input type="file" name="photo"></p>
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
    <p><a href="deletecatalog.php" style="color:#81BEF7;">Удаление продукта</a></p>
   <?php else: ?>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
      <?php endif; 
	   $mysql->close();?> 
  </div>
 </body>
</html>