<link rel="stylesheet" type="text/css" href="style.css" ></link>
<script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>

<?php
// login datebase
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
$method=$_SERVER["REQUEST_METHOD"];

if($_GET['code'])
{
	 $get_username = $GET['username'];
	 $get_code = $_GET['code'];
	 
	 $query = mysql_query("SELECT * FROM mainsite_users WHERE username='get_username'");

      while($row = mysql_fetch_assoc($query))
	  {
		  $db_code = $row['passreset'];
		  $db_username = $row['username'];
	  }
	  if($get_username == $db_username && $get_code == $db_code)
	  {
		  echo "
		  
		  <form action='pass_reset_complete.php?code=$code' method='POST'>
		  Enter a new password<br><input type='password' name='newpass'><br>
		  Re-enter your password<input type='password' name='newpass1'><br>
		  <input type='hidden' name='username' value='$db_username'>
		  <input type='submit' value='Update Password!'>
		  </form>
		  
		  ";
      }
}

if(!$_GET['code'])
{


if(isset($_POST['submit']))
{
	 $username = $_POST['username'];
	 $email = $_POST['email'];
	 
	 $query = mysql_query("SELECT * FROM mainsite_users WHERE username='$username'");
	 $numrow = mysql_num_rows($query);
	 
	 if($numrow!=0)
	 {
		 while($row = mysql_fetch_assoc($query))
		 {
			$db_email = $row['email']; 
		 }
		 if($email == $db_email)
         {
	        $code = rand(10000,1000000);
			
			$to = $db_email;
			$subject = "Password Reset";
			$body = "
			
			This is an automated email. Please DO not reply to this email. Click the link below or paste it into your browser
			127.0.0.1/forgot_pass?code=$code&username=$username
			
			";
			
			mysql_query("UPDATE mainsite_users SET passreset='$code' WHERE username='$username'");
			
			mail($to,$subject,$body);
			
			echo "Check Your Email";
         }
	     else
	     {
		    echo "Email is incorrect";
         }
	 }
	 else
	 {
		 echo "That username doesn't exist";
	 }
}
}
?>