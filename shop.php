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
   <p><a href="aut.php" style="color:#81BEF7;">Войдите</a> или <a href="reg.php" style="color:#81BEF7;">зарегистрируйтесь</a>, чтобы получить доступ к заказам и скидкам!</p>
   <?php else: ?>
    <p> Приветствуем Вас, <?=$_COOKIE['user']?>. Чтобы выйти, нажмите <a href="exit.php">здесь</a>.</p>
   <?php endif; ?>
  </div>
  <div class="menu">
   <p align=center> <a href="contact.php" style="padding: 10px 5% 10px;">Контакты/Адрес</a>
                    <a href="aboutus.php" style="padding: 10px 5% 10px;">О нас</a> 
	                <a href="main.php" style="padding: 10px 10% 10px 5%;">Главная</a>
	                <a href="catalog.php" style="padding: 10px 10% 10px 5%;">Каталог</a>
	                <b style="color:#BDBDBD;">Купить</b>
					<a href="comments.php" style="padding: 10px 5% 10px 10%;">Отзывы</a></p>
  </div>
  <div class="main" style="text-align:center">
   <p> При заказе с сайта все виды кофе стоят 70/110/150 рублей за 250/350/450 мл соответственно! </p>
   <form action="" method="POST">
    <p>Напиток: 
     <select name="drink[]" size="1">
      <option value="Капучино">Капучино</option>
      <option value="Латте">Латте</option>
      <option value="Флэт уайт">Флэт уайт</option>
      <option value="Эспрессо">Эспрессо</option>
      <option value="Американо">Американо</option>
      <option value="Латте Макиато">Латте Макиато</option>
      <option value="Макиато">Макиато</option>
      <option value="Моккачино">Моккачино</option>
     </select></p>
    <p>Размер стаканчика: 
     <select name="size[]" size="1">
      <option value="250ml">Маленький(250мл)</option>
      <option value="350ml">Средний(350мл)</option>
      <option value="450ml">Большой(450мл)</option>
     </select></p>
    <p>Количество: 
     <select name="count[]" size="1">
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
 </body>
</html>