<?php
$con = mysql_connect("localhost","root","12345678");
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

mysql_close($con)
?>