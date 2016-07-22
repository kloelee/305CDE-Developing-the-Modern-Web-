<link rel="stylesheet" type="text/css" href="style.css" ></link>
<script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>

<?php
// login datebase
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
$method=$_SERVER["REQUEST_METHOD"];



$newpass = $_POST['newpass'];
$newpass = $POST['newpass1'];
$post_username = $_POST['username'];
$code = $_GET['code'];

if($newpass == $newpass1)
{
	$enc_pass = md5($newpass);
	
	mysql_query("UPDATE mainsite_users SET password='$newpass' WHERE username='$post_username'");
	mysql_query("UPDATE mainsite_users SET passreset='0' WHERE username='$post_username'");
	
	echo "Your password has been updated<p><a href='127.0.0.1/index.html'>Click here to login</a>";
	
}
else
{
   echo "Passwords must match <a href='forgot_pass.php?code=$code&username=$post_username'>Click here to go back	<a/>";
}


?>
