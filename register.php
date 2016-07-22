<?php
// login datebase
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
$method=$_SERVER["REQUEST_METHOD"];
	    
	    $username=$_POST['usid'];
	    $pwd=$_POST['pwid'];
		$email=$_POST['elid'];

		
     	mysql_select_db("mykloedb", $connection) or die("Could not select database");
		
		

		
		$res = mysql_query("SELECT username FROM memberlist WHERE username='$username'");
		$row = mysql_fetch_row($res);
			
			if( $row > 0 ){
			 echo "Username $username has already been taken, please try another";}
			else
			{
				
				 
		 $result = mysql_query("INSERT INTO memberlist(username,password,email) VALUES ('$username','$pwd','$email')") or die("Could not issue MySQL query");
				echo "Successful"; 
			}
?>