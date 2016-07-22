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

mysql_query("INSERT INTO guest (guestName, guestEmail, guestGender, guestSubject, guestContent) 
VALUES ('locar', 'locarchan@mail.com', 'female', 'SameSexMarriage', 'Marriage should be between a spouse and a spouse, not a gender and a gender.')");

mysql_query("INSERT INTO guest (guestName, guestEmail, guestGender, guestSubject, guestContent) 
VALUES ('donald', 'donald@mail.com', 'male', 'Homosexual', 'The rights of homosexual people are human rights, and human rights are for everyone.')");

mysql_query("INSERT INTO guest (guestName, guestEmail, guestGender, guestSubject, guestContent) 
VALUES ('kloelee', 'kloetachibana@hotmail.com', 'female', 'Marriage equality', 'If heterosexual people can get married then gay and lesbian people can get married too')");

mysql_close($con)
?>