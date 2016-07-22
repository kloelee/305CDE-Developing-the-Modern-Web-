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

mysql_query("DELETE FROM memberlist WHERE username='kloelee2'");
mysql_query("DELETE FROM memberlist WHERE id='5'");
mysql_query("DELETE FROM memberlist WHERE id='6'");
mysql_query("DELETE FROM memberlist WHERE id='7'");

mysql_close($con);
?>