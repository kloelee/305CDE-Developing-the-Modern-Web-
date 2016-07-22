<?php

session_start();
require_once("mysql.php");

switch ($_SERVER['REQUEST_METHOD']){
case 'GET':

	$str="SELECT g.guestID , u.username `guestName`, u.email `guestEmail`, `guestSubject`, `guestContent`, `guestTime`, u.id = '".$_SESSION['user']['id']."' `updatable` From guest g inner join memberlist u on g.guestName = u.id order by guestTime desc";
	$data = $db->query($str)->rows;
	echo json_encode($data);
	
	break;
	
case 'PUT':
    parse_str(file_get_contents("php://input"),$post_vars);
	$str="Select * From guest where id =".(int)$post_vars['id'] ." and guestName = ".$_SESSION['user']['id'];
	$data = $db->query($str)->rows;	
	if(count($data) > 0){		
		$str="Update guest set `guestSubject` = '".$post_vars['subject']."' , `guestContent` = '".$post_vars['comment']."'  where id =".(int)$post_vars['id'];
		$data = $db->query($str)->rows;	
	}
	break;

  default:
    break;

case 'DELETE':
    parse_str(file_get_contents("php://input"),$post_vars);
	$str="Delete From guest where id =".(int)$post_vars['id'];
	$data = $db->query($str)->rows;	
	break;

  default:
    break;
}
?>