<?php
// login datebase
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$con = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
$method=$_SERVER["REQUEST_METHOD"];

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mykloedb", $con);
$sql = "CREATE TABLE guest 
(
guestID int not null auto_increment primary key,
guestName varchar(25),
guestEmail varchar(30),
guestGender varchar(1),
guestSubject varchar(25),
guestTime datetime,
guestContent text,
)";
mysql_query($sql,$con);

mysql_close($con);
?>