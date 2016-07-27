<?php

session_start();
require_once("mysql.php");

switch ($_SERVER['REQUEST_METHOD']){
case 'GET':

	$str="SELECT g.guestid id, u.username `guestName`, u.email `guestEmail`, `guestSubject`, `guestContent`, `guestTime`, u.id = '".$_SESSION['user']['id']."' `updatable` From guest g inner join memberlist u on g.guestName = u.id order by guestTime desc";
	$data = $db->query($str)->rows;
	echo json_encode($data);
	
	break;

case "POST":

	if( !empty($_POST['subject']) && !empty($_POST['comment'])){
		$db->query("INSERT INTO `guest` (`guestName` ,`guestGender` ,`guestSubject` ,`guestTime` ,`guestContent`) VALUES (".$_SESSION['user']['id'].",'','".$_POST['subject']."',NOW(),'".$_POST['comment']."');");
		echo "Successful";
	}
	break;
	
case 'PUT':
    parse_str(file_get_contents("php://input"),$post_vars);
	$str="Select * From guest where guestid =".(int)$post_vars['id'] ." and guestName = ".$_SESSION['user']['id'];
	$data = $db->query($str)->rows;	
	if(count($data) > 0){		
		$str="Update guest set `guestSubject` = '".$post_vars['subject']."' , `guestContent` = '".$post_vars['comment']."'  where guestid =".(int)$post_vars['id'];
		$data = $db->query($str)->rows;	
		echo "Successful";
	}else echo "No this comment";
	break;

  default:
    break;

case 'DELETE':
    parse_str(file_get_contents("php://input"),$post_vars);
	$str="Select * From guest where guestid =".(int)$post_vars['id'] ." and guestName = ".$_SESSION['user']['id'];
	$data = $db->query($str)->rows;	
	if(count($data) > 0){		
		$str="Delete From guest where guestid =".(int)$post_vars['id'];
		$data = $db->query($str)->rows;	
		echo "Successful";
	}else echo "No this comment";
	break;

  default:
    break;
}
?>