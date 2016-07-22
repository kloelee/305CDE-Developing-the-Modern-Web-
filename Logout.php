<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
$method=$_SERVER["REQUEST_METHOD"];

error_reporting(E_ALL &~E_NOTICE);
session_start();
session_destroy();
setcookie("username","",time()-7200);

header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
 <title>Logout Page</title>
 <link rel="stylesheet" type="text/css" href="style.css" ></link>
 <script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
</head>
<script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>


</head>
 <body>
  <div id='body' align='center'>
<br/> <br/>
   <div id='container'>
    <div id='login'><br/><br/>
<form>
<a href=index.html class="button2">BACK LOGIN</a>
</form>
    </div>
   </div>
  </div>
 </body>
</html>