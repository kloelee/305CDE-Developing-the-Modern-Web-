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

mysql_query("UPDATE memberlist SET email = 'locarchan@email.com'
WHERE username = 'locar' AND password = '123'");

mysql_close($con);
?>