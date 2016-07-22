<?php
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

mysql_query("INSERT INTO memberlist (username, password, email) 
VALUES ('locar', '123', 'locar@mail.com')");

mysql_query("INSERT INTO memberlist (username, password, email) 
VALUES ('donald', '456', 'donald@mail.com')");

mysql_query("INSERT INTO memberlist (username, password, email) 
VALUES ('kloelee', '789', 'kloetachibana@hotmail.com')");

mysql_query("INSERT INTO memberlist (username, password, email) 
VALUES ('kloelee2', '741', 'kloetachibana@mail.com')");

mysql_close($con)
?>