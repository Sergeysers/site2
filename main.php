<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title> Главная </title>
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
   <?php else: ?>
    <p> Приветствуем Вас, <?=$_COOKIE['user']?>. Чтобы выйти, нажмите <a href="exit.php">здесь</a>.
   <?php endif; ?>         
  </div>
  <div class="menu" align=center>
   <p> <a href="contact.php" style="padding: 10px 5% 10px;">Контакты/Адрес</a>
       <a href="aboutus.php" style="padding: 10px 10% 10px 5%;">О нас</a> 
	   <b style="color:#BDBDBD;"> Главная </b>
	   <a href="catalog.php" style="padding: 10px 5% 10px 10%;">Каталог</a>
	   <a href="shop.php" style="padding: 10px 5% 10px;">Купить</a>
	   <a href="comments.php" style="padding: 10px 5% 10px;">Отзывы</a></p></p>
  </div>
  <div class="main">
   <p align=center> Добро пожаловать на сайт кофейной сети "Cofeйня"! Здесь вы можете: <ul>
                                                                                           <li>ознакомиться с информацией о нас и наших заведениях (разделы "О нас" и "Контакты/Адрес"),</li>
                                                                                           <li>оставить о нас отзывы (раздел "Отзывы"),</li> 																						   
                                                                                           <li>узнать цены на нашу продукцию (раздел "Каталог")</li>
                                                                                           <li>и даже заказать её (раздел "Купить", необходима регистрация)!</li>
                                                                                       </ul>
   <p  align=center> Для перехода по разделам воспользуйтесь меню сверху.</p>
   <p  align=center><img src="spider.jpg" alt="Паук" width="400" height="400"></p>
  </div>
  <div class="footer" align=center>
   <p> © Разработано на ИУ4-11Б Еловским Никитой </p>
  </div>
 </body>
</html>