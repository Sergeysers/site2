<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title> Вход </title>
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
   <form action="checkaut.php" method="post">
    <p>Ваша почта: <input type="email" name="email"><br></p>
    <p>Ваш пароль: <input type="password" name="password"><br></p>
    <input type="submit" name="submit">
   </form>
   <p> Еще не зарегистрированы? <a href="reg.php" style="color:#81BEF7;"> Зарегистрироваться </a></p>
  </div>
  <div class="footer">
   <p align=center> © Разработано на ИУ4-11Б Еловским Никитой </p>
  </div>
 </body>
</html>

