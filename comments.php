<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title> Отзывы </title>
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
   <p><a href="aut.php" style="color:#81BEF7;">Войдите</a> или <a href="reg.php" style="color:#81BEF7;">зарегистрируйтесь</a>, чтобы получить доступ к заказам и скидкам!</p>
   <?php else: ?>
    <p> Приветствуем Вас, <?=$_COOKIE['user']?>. Чтобы выйти, нажмите <a href="exit.php">здесь</a>.</p>
   <?php endif; ?>
  </div>
  <div class="menu">
   <p align=center> <a href="contact.php" style="padding: 10px 5% 10px 0%;">Контакты/Адрес</a>
                    <a href="aboutus.php" style="padding: 10px 5% 10px;">О нас</a> 
	                <a href="main.php" style="padding: 10px 5% 10px;">Главная</a>
	                <a href="catalog.php" style="padding: 10px 5% 10px;">Каталог</a>
	                <a href="shop.php" style="padding: 10px 10% 10px 5%;">Купить</a>
					<b style="color:#BDBDBD;">Отзывы</b></p>
  </div>
  <div class="main" align=center>

  </div>
  <div class="footer" align=center>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
  </div>
 </body>
</html>