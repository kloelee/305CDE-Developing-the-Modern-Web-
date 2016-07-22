<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
$method=$_SERVER["REQUEST_METHOD"];

	
$username=$_POST['username'];
$password=$_POST['password'];
$remember = $_POST['rememberme'];

mysql_select_db("mykloedb", $connection) or die("Could not select database");
$data = mysql_query("select * from memberlist where username = '$username' and password = '$password'");
 if(mysql_num_rows($data) == 1){

	session_start();
	$array = mysql_fetch_assoc($data);
	$_SESSION['user'] = $array;
	if ($remember=="on")
	 	setcookie("username", $data['id'], time()+7200);
	else if ($rememberme=="")
	 	$_SESSION['username']==$username;	
  	echo "Successful"; 
 }else{
  	echo "Unsuccessful";
 }

?>