<?php
require_once("mysql.php");
session_start();
if(isset($_SESSION['user'] ) && !empty($_POST['subject']) && !empty($_POST['comment'])){
	$db->query("INSERT INTO `guest` (`guestName` ,`guestGender` ,`guestSubject` ,`guestTime` ,`guestContent`) VALUES (".$_SESSION['user']['id'].",'','".$_POST['subject']."',NOW(),'".$_POST['comment']."');");
	
}
header("Location: get_comment.php");

?>