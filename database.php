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

if (mysql_query("CREATE DATABASE mykloedb",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

mysql_select_db("mykloedb", $con);
$sql = "CREATE TABLE memberlist 
(
id int(10) not null auto_increment primary key,
username varchar(15),
password varchar(15),
email varchar(30),
timestamp timestamp not null default current_timestamp
)";
mysql_query($sql,$con);

mysql_close($con);
?>