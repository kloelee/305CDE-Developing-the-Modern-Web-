<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
$method=$_SERVER["REQUEST_METHOD"];

$guestName=$_POST['guestName'];
$guestEmail=$_POST['guestEmail'];
$guestGender=$_POST['guestGender'];
$guestSubject=$_POST['guestSubject'];
$guestContent=$_POST['guestContent'];
//$guestTime = date("Y:m:d H:i:s",time()+28800);

     	mysql_select_db("mykloedb", $connection) or die("Could not select database");
	
		$result = mysql_query("INSERT INTO guest(guestName,guestEmail,guestGender,guestSubject,guestContent,guestTime) VALUES ('$guestName','$guestEmail','$guestGender','$guestSubject','$guestContent',NOW())") or die("Unsuccessful");
		
			
		if($result == 1) echo "Successful";
		if($result == 0) echo "Unsuccessful";
?>