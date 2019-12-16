 /*create database*/
 CREATE DATABASE 'registersite';
 /*create tables*/
 CREATE TABLE IF NOT EXISTS 'catalog' (
 'id' int(3) NOT NULL AUTO_INCREMENT ,
 'namepr' varchar(20) NOT NULL
 'descr' varchar(200) NOT NULL,
 'gen' varchar(12) NOT NULL,
 'cost250' int(4) NOT NULL,
 'cost350' int(4) NOT NULL,
 'cost450' int(4) NOT NULL,
 'photo' longblob NOT NULL);
 
  CREATE TABLE IF NOT EXISTS 'comments' (
 'id' int(3) NOT NULL AUTO_INCREMENT ,
 'email' varchar(30) NOT NULL
 'com' varchar(200) NOT NULL,
 'name' varchar(20) NOT NULL);
 
  CREATE TABLE IF NOT EXISTS 'shop' (
 'id' int(3) NOT NULL AUTO_INCREMENT ,
 'drink' varchar(20) NOT NULL
 'size' varchar(20) NOT NULL,
 'count' int(1) NOT NULL,
 'time' time(6) NOT NULL,
 'dateorder' date NOT NULL,
 'name' varchar(20) NOT NULL,
 'email' varchar(30) NOT NULL);
 
  CREATE TABLE IF NOT EXISTS 'users' (
 'id' int(3) NOT NULL AUTO_INCREMENT ,
 'email' varchar(30) NOT NULL
 'name' varchar(20) NOT NULL,
 'password' varchar(30) NOT NULL,
 'admin' int(1) NOT NULL,
 'ban' date NOT NULL,
 'reason' varchar(20) NOT NULL);
 
 /*connection*/
 $mysql = new mysqli('localhost','root','','registersite');
 
 /*addcatalogform.php*/
 $mysql->query("INSERT INTO `catalog` (`namepr`,`descr`,`gen`,`cost250`,`cost350`,`cost450`,`photo`)
 VALUES('$namepr','$descr','$gen','$cost250','$cost350','$cost450','$photo')");
 
 /*banform.php*/ 
 $mysql->query("UPDATE `users` SET `ban`='$ban',`reason`='$reason' WHERE `id`='$idban' ");
 
 /*catalog.php*/if ($sort == "Цена") {
$query ="SELECT `photo`,`namepr`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog` ORDER BY `cost250` ";}
elseif ($sort == "Производитель") {
$query ="SELECT `photo`,`namepr`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog` ORDER BY `descr` ";}
elseif ($sort == "Алфавит") {
$query ="SELECT `photo`,`namepr`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog` ORDER BY `namepr` ";}
elseif ($sort == "") {
$query ="SELECT `photo`,`namepr`,`gen`,`descr`,`cost250`,`cost350`,`cost450` FROM `catalog` ";}

 /*chech.php*/
 $mysql->query("INSERT INTO `users` (`email`,`name`,`password`,`admin`)
 VALUES('$email', '$name', '$password', '$admin')"); 
 
 /*chechaut.php*/
  $result = $mysql->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");
  $query ="SELECT `ban`,`reason` FROM `users` WHERE `email`='$email' AND `password`='$password'";
  
 /*commentsform*/
  $mysql->query("INSERT INTO `comments` (`com`,`name`,`email`)
  VALUES('$com', '$name', '$email')");
  
 /*deletecatalogform.php*/
   $mysql->query("DELETE FROM `catalog` WHERE `namepr`='$namepr'");
   
 /*deletecommentsform.php*/
   $mysql->query("DELETE FROM `comments` WHERE `id`='$iddel'");
   
 /*deleteform.php*/
   $mysql->query("DELETE FROM `users` WHERE `id`='$iddelacc'");
   
 /*shopform.php*/
   $mysql->query("INSERT INTO `shop` (`drink`,`size`,`count`,`time`,`dateorder`,`email`,`name`)
   VALUES('$drink','$size','$count','$time','$dateorder','$email','$name')"); 
